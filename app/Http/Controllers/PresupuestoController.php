<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Presupuesto;
use Session;

class PresupuestoController extends Controller {
    // public function __construct() {$this->middleware('auth'); }
    public function index() {
        
    }

    public function create() {
        return view('presupuestos.create');
    }

    public function store(Request $request) {
        $presupuesto = new Presupuesto;
        $presupuesto->fill($request->all());
        $presupuesto->save();

        Session::flash('message','Gracias por confiar en nosotros, en breve recibirá la cotización en su email.');
        return redirect('/');
    }

    public function show($id) {
    }

    public function edit($id) {
    }

    public function update(Request $request, $id) {
    }

    public function destroy($id) {
        $presupuesto = Presupuesto::findOrFail($id);
        $presupuesto->delete();
        return redirect('/admin');
    }
}
