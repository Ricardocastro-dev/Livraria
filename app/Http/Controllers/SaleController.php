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




class SaleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Aplica o middleware 'auth' a todas as rotas desse controlador
    }


    public function shop()
    {
        $books = Book::where('amount', '>', 0)->get(); // Pegando apenas livros com estoque disponível
        return view('sale.shop', compact('books'));
    }

    public function confirm(Request $request)
    {

        #dd($request->all());
        $book = Book::findOrFail($request->book_id);
        $totalValue = $book->sale_price * $request->quantity;

        return view('sale.confirm', [
            'book' => $book,
            'quantity' => $request->quantity,
            'total' => $totalValue
        ]);
    }
   
        
        



    #dd($request->all());
    public function store(Request $request)
    {
        //dd($request->all());
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
        
        // Verificando se o usuário está logado
        $userId = auth()->check() ? auth()->id() : null; // Se não estiver logado, user_id será null
        
        // Criando a venda
        $sale = Sale::create([
            'user_id' => $userId,  // Pode ser null se o usuário não estiver logado
            'book_id' => $request->book_id,
            'quantity' => $request->quantity,
            'total_value' => $totalValue,
        ]);
        
        // Atualizando o estoque do livro
        $book->amount -= $request->quantity;
        $book->save();
        
        // Redireciona para a página Pix com o id da venda
        return redirect()->route('sale.pix', ['sale' => $sale->id])->with('success', 'Venda registrada com sucesso!');
    }

    public function gerarPix($saleId)
    {
        //dd($request->all());
        $sale = Sale::findOrFail($saleId);

        // Gerar número aleatório para a chave Pix
        $pixKey = rand(1000000000000000, 9999999999999999);

        return view('sale.pix', compact('sale', 'pixKey'));

    }
}
