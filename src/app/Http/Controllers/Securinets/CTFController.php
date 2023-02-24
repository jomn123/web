<?php

namespace App\Http\Controllers\Securinets;

use App\Models\CTF;
use Illuminate\Http\Response;
use App\Http\Resources\CTFResource;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Http\Resources\CTFCollection;
use App\Traits\RespondsWithHttpStatus;

class CTFController extends Controller
{
    use RespondsWithHttpStatus;
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return $this->success(CTFCollection::collection(CTF::all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(CTF $ctf): Response
    {
        $response = Gate::inspect('view', $ctf);

        if ($response->allowed()) {
            return $this->success(new CTFResource($ctf));
        }

        return $this->failure($response->message(), 403);
    }
}
