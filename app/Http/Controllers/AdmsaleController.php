<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Sale;
use App\Http\Requests\SaleRequest;
use App\Models\Book;
use App\Models\User;
use App\Models\Publisher;
use App\Models\Author;
use Illuminate\Support\Facades\Auth;


class AdmsaleController extends Controller
{
    public function index()
    {
        
        #$sales = Sale::orderByDesc('id')->get();
        #$sales = Sale::with(['publisher', 'author'])->orderByDesc('id')->get();
        $sales = Sale::with(['book.publisher', 'book.author'])->orderByDesc('id')->get();
        ##['sales' => $sales];
        #dd($sales);

        ##$books = Book::with(['publisher', 'author'])->get();
        ##, compact('books')

        #$books = Book::with(['publisher', 'author'])->get();
        #, compact('books')

        return view('admsale.index', compact('sales'));
    }



    public function show(Sale $sale)
    {
        $sale->load('user', 'book'); // Carrega os relacionamentos do comprador e do livro
    
        return view('admsale.show', ['sale' => $sale]);
    }
    


    public function create()
    {
        $books = Book::where('amount', '>', 0)->get(); // Pegando apenas livros com estoque disponível
        $users = User::all();
        return view('admsale.create', compact('books', 'users'));
    }


    #dd($request->all());

    
    public function store(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'quantity' => 'required|integer|min:1',
        ]);
        
        // Pegando o livro pelo ID
        $book = Book::findOrFail($request->book_id);
        
        // Verifica se há estoque suficiente
        if ($request->quantity > $book->amount) {
            return redirect()->back()->with('error', 'Quantidade maior que o estoque disponível!');
        }
        
        // Calculando o valor total
        $totalValue = $book->sale_price * $request->quantity;
        
        $userId = $request->user_id;
        // Pegando o ID do usuário logado (seja cliente ou admin)
        #$userId = auth()->id();
        
        #if (!$userId) {
            #return redirect()->back()->with('error', 'Usuário não autenticado para realizar a compra!');
        #}
        
        // Criando a venda com o ID do usuário logado
        $sale = Sale::create([
            'user_id' => $userId,  
            'book_id' => $request->book_id,
            'quantity' => $request->quantity,
            'total_value' => $totalValue,
            ]);
        
        // Atualizando o estoque do livro
        $book->amount -= $request->quantity;
        $book->save();
        
            // Redireciona para a página de vendas
        return redirect()->route('admsale.index')->with('success', 'Venda registrada com sucesso!');
    }
        


    public function edit(Sale $sale)
    {
        $users = User::all(); // Buscar todos os usuários
        $books = Book::all(); // Buscar todos os livros

        return view('admsale.edit', [
            'sale' => $sale,
            'users' => $users,
            'books' => $books,
        ]);
    }




    public function update(Request $request, Sale $sale)
    {
        // Validação dos dados
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'quantity' => 'required|integer|min:1',
            'user_id' => 'nullable|exists:users,id',
        ]);

        // Pegando o livro pelo ID
        $book = Book::findOrFail($request->book_id);

        // Verifica se há estoque suficiente ao atualizar a venda
        $stockAvailable = $book->amount + $sale->quantity; // Repondo a quantidade anterior
        if ($request->quantity > $stockAvailable) {
            return redirect()->back()->with('error', 'Quantidade maior que o estoque disponível!');
        }

        // Calculando o novo valor total
        $totalValue = $book->sale_price * $request->quantity;

        // Atualizando a venda
        $sale->update([
            'user_id' => $request->user_id,
            'book_id' => $request->book_id,
            'quantity' => $request->quantity,
            'total_value' => $totalValue,
        ]);

        // Atualizando o estoque do livro
        $book->amount = $stockAvailable - $request->quantity;
        $book->save();

        return redirect()->route('admsale.index')->with('success', 'Venda atualizada com sucesso!');
    }




    public function destroy(Sale $sale)
    {
        // Restaurar o estoque antes de excluir a venda
        $book = Book::findOrFail($sale->book_id);
        $book->amount += $sale->quantity;
        $book->save();

        // Excluir a venda
        $sale->delete();

    return redirect()->route('admsale.index')->with('success', 'Venda deletada com sucesso!');
}



}
