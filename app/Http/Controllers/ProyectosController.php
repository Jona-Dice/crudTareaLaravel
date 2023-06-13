<?php

namespace App\Http\Controllers;

use App\Models\proyectos;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ProyectosController extends Controller
{
    //
    public function index():Renderable{
        $proyectos = proyectos::paginate();
        return view('proyectos.index',compact('proyectos'));

    }
    public function report(){
        $proyectos = proyectos::all();

        $pdf = Pdf::loadView('proyectos.report', compact('proyectos'));
        return $pdf->stream('proyectos_report.pdf');
        //return $pdf->download('invoice.pdf');
    }

    public function create(): Renderable
    {
        $proyectos = new Proyectos;
        $title = __('Crear proyecto');
        $action = route('proyectos.store');
        $buttonText = __('Crear proyecto');
        return view('proyectos.form', compact('proyectos', 'title', 'action', 'buttonText'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nombreProyecto' => 'required|unique:proyectos,nombreProyecto|string|max:100',
            'fuenteFondos' => 'required|string|max:1000',
            'montoPlanificado' => 'required|string|max:1000',
            'montoPatrocinado' => 'required|string|max:1000',
            'montoFondosPropios' => 'required|string|max:1000',
        ]);
        Proyectos::create([
            'nombreProyecto' => $request->string('nombreProyecto'),
            'fuenteFondos' => $request->string('fuenteFondos'),
            'montoPlanificado' => $request->string('montoPlanificado'),
            'montoPatrocinado' => $request->string('montoPatrocinado'),
            'montoFondosPropios' => $request->string('montoFondosPropios'),
        ]);
        return redirect()->route('proyectos.index');
    }

    public function show(Proyectos $proyectos): Renderable
    {
        $proyectos->load('user:id,name');
        return view('proyectos.show', compact('proyectos'));
    }

    public function edit($nombreProyecto)/*: Renderable*/
    {
       /* $title = __('Editar proyecto');
        $action = route('proyectos.update', $proyectos);
        $buttonText = __('Actualizar proyecto');
        $method = 'PUT';
        return view('proyectos.form', compact('proyectos', 'title', 'action', 'buttonText', 'method'));*/
        $proyectos=proyectos::findOrFail($nombreProyecto);
        return view('proyectos.edit',compact('proyectos'));
    }

    /*public function update(Request $request, $proyectos) //: RedirectResponse
    {
        $request->validate([
            //'nombreProyecto' => 'required|unique:proyectos,nombreProyecto,' . $proyectos->id . '|string|max:100',
            'nombreProyecto' => 'required|string|max:1000',
            'fuenteFondos' => 'required|string|max:1000',
            'montoPlanificado' => 'required|string|max:1000',
            'montoPatrocinado' => 'required|string|max:1000',
            'montoFondosPropios' => 'required|string|max:1000',
        ]);
        $proyectos->update([
            'nombreProyecto' => $request->string('nombreProyecto'),
            'fuenteFondos' => $request->string('fuenteFondos'),
            'montoPlanificado' => $request->string('montoPlanificado'),
            'montoPatrocinado' => $request->string('montoPatrocinado'),
            'montoFondosPropios' => $request->string('montoFondosPropios'),
        ]);
            /*$datosProyecto=request();
            proyectos::where('nombreProyecto','=',$nombreProyecto)->update($datosProyecto);
            $proyectos=proyectos::findOrFail($nombreProyecto);
            return view('proyectos.edit',compact('proyectos'));*/
        //return redirect()->route('proyectos.index');
    //}
    public function update(Request $request, Proyectos $proyectos)//: RedirectResponse
{
    $request->validate([
        'nombreProyecto' => 'required|unique:proyectos,nombreProyecto,' . $proyectos->id . '|string|max:1000',
        'fuenteFondos' => 'required|string|max:1000',
        'montoPlanificado' => 'required|string|max:1000',
        'montoPatrocinado' => 'required|string|max:1000',
        'montoFondosPropios' => 'required|string|max:1000',
    ]);

    $proyectos->update([
        'nombreProyecto' => $request->input('nombreProyecto'),
        'fuenteFondos' => $request->input('fuenteFondos'),
        'montoPlanificado' => $request->input('montoPlanificado'),
        'montoPatrocinado' => $request->input('montoPatrocinado'),
        'montoFondosPropios' => $request->input('montoFondosPropios'),
    ]);

    $proyectos=proyectos::findOrFail($proyectos);
        return view('proyectos.edit',compact('proyectos'));
}


    public function destroy($nombreProyecto)/*: RedirectResponse*/
    {
        proyectos::destroy($nombreProyecto);
        return redirect('proyectos');
        /*$proyectos->delete();
        return redirect()->route('proyectos.index');*/
    }
}
