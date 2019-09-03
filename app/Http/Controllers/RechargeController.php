<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Freshwork\Transbank\CertificationBagFactory;
use Freshwork\Transbank\TransbankServiceFactory;
use Freshwork\Transbank\RedirectorHelper;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Sale;
use App\CategoriaUser;

class RechargeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('intranet.recarga.recargar');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $rules = [
            'monto_carga' => 'required|numeric|min:1000'
        ];

        $this->validate($request, $rules);

        $num_venta = Sale::get()->count();
        $bag = CertificationBagFactory::integrationWebpayNormal();
        $plus = TransbankServiceFactory::normal($bag);
        $plus->addTransactionDetail($request->input('monto_carga'), $num_venta); // Monto e identificador de la orden

        $response = $plus->initTransaction(url('/registrarVenta'), url('/finalizarVenta'));

        $sale = new Sale();
        $sale->token = $response->token;
        $sale->monto_venta = $request->input('monto_carga');
        $sale->user_id = \Auth::user()->id;
        $sale->save();

        return RedirectorHelper::redirectHTML($response->url, $response->token);
    }

    public function finalizarVenta(Request $request){
        $venta = Sale::where('token', $request->token_ws)->first();
        $mensaje = "La carga no se ha podido realizar. Por favor intente nuevamente.";

        if($venta != null){
            $mensaje = "Muchas gracias por recarga, tu saldo ya ha sido cargado.";
            $total = Sale::where('user_id', \Auth::user()->id)->pluck('monto_venta')->get()->sum();
            $categoria = CategoriaUser::where('gasto_inicio','>=', $total)->where('gasto_fin', '<=', $total)->take(1)->get();
            
            if(\Auth->user()->categoria_id != $categoria->categoria_id){
                $mensaje = "Muchas gracias por recarga, tu saldo ya ha sido cargado y has sudibo a la siguiente categoría:" . $categoria->nombre . ", sigue así para seguir desbloqueando nuevas funciones.";
            }
        }

        return view('intranet.recarga.finalizar')->with(compact('mensaje'));
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function registrarVenta(Request $request)
    {
        $bag = CertificationBagFactory::integrationWebpayNormal();
        $plus = TransbankServiceFactory::normal($bag);
        $response = $plus->getTransactionResult();
        
        // Comprueba que el pago se haya efectuado correctamente
        if($response->detailOutput->responseCode == 0){
            $user = User::findOrFail(Auth::user()->id);
            $user->saldo = $user->saldo + $response->detailOutput->amount;
            $user->save();

            $venta = Sale::where('token', $request->token_ws)->first();
            $venta->estado = 1;
            $venta->save();        
        }

        $plus->acknowledgeTransaction();
        return RedirectorHelper::redirectBackNormal($response->urlRedirection);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
