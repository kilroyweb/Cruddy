<?php

namespace KilroyWeb\Cruddy\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use KilroyWeb\Cruddy\Support\Str;

abstract class CruddyController extends Controller
{

    protected $model;
    protected $variablePlural;
    protected $variableSingular;
    protected $viewBase;
    protected $routeBase;
    protected $storeSuccess = 'Saved!';
    protected $updateSuccess = 'Saved!';
    protected $destroySuccess = 'Deleted!';

    public function __construct()
    {
        if ($this->model) {
            $className = Str::classShortName($this->model);
            if (!$this->variablePlural) {
                $this->variablePlural = Str::pluralVariable($className);
            }
            if (!$this->variableSingular) {
                $this->variableSingular = Str::singularVariable($className);
            }
            if (!$this->viewBase) {
                $this->viewBase = Str::viewPath($this->variableSingular);
            }
            if (!$this->routeBase) {
                $this->routeBase = Str::routePath($this->variableSingular);
            }
        }
    }

    public function index(Request $request){
        $modelClass = $this->model;
        $models = $modelClass::all();
        return view($this->viewBase.'.index', [
            'request' => $request,
            $this->variablePlural => $models,
        ]);
    }

    public function create(Request $request){
        return view($this->viewBase.'.create', [
            'request' => $request,
        ]);
    }

    public function store(Request $request){
        $modelClass = $this->model;
        $model = $modelClass::create($request->all());
        return redirect($this->routeBase)->withSuccess($this->storeSuccess);
    }

    public function show(Request $request, $modelId){
        $modelClass = $this->model;
        $model = $modelClass::findOrFail($modelId);
        return view($this->viewBase.'.show', [
            'request' => $request,
            $this->variableSingular => $model,
        ]);
    }

    public function edit(Request $request, $modelId){
        $modelClass = $this->model;
        $model = $modelClass::findOrFail($modelId);
        return view($this->viewBase.'.edit', [
            'request' => $request,
            $this->variableSingular => $model,
        ]);
    }

    public function update(Request $request, $modelId){
        $modelClass = $this->model;
        $model = $modelClass::findOrFail($modelId);
        $model->update($request->all());
        return redirect($this->routeBase)->withSuccess($this->updateSuccess);
    }

    public function destroy(Request $request, $modelId){
        $modelClass = $this->model;
        $model = $modelClass::findOrFail($modelId);
        $model->delete();
        return redirect($this->routeBase)->withSuccess($this->destroySuccess);
    }

}