<?php

namespace App\Http\Controllers;

use App\Customer_review;
use Illuminate\Http\Request;

class CustomerReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = Customer_review::all();

        return view('avis.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('avis.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'username'=>'required',
            'note'=>'required',
            'titre'=>'required',
            'email'=>'required'
        ]);

        $avis = new Customer_review([
            'nom' => $request->get('nom'),
            'note' => $request->get('note'),
            'titre' => $request->get('titre'),
            'message' => $request->get('messagee')
        ]);
        $avis->save();
        return redirect('/avis')->with('success', 'Avis bien enregistré !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer_review  $customer_review
     * @return \Illuminate\Http\Response
     */
    public function show(Customer_review $customer_review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer_review  $customer_review
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $avis = Customer_review::find($id);
        return view('avis.edit', compact('avis'));     
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer_review  $customer_review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer_review $customer_review, $id)
    {
        $request->validate([
            'username'=>'required',
            'note'=>'required',
            'titre'=>'required',
            'message'=>'required'
        ]);

        $avis = Customer_review::find($id);
        $avis->username =  $request->get('username');
        $avis->note = $request->get('note');
        $avis->titre = $request->get('titre');
        $avis->message = $request->get('message');
        $avis->save();

        return redirect('/avis')->with('success', 'Contact mis à jour!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer_review  $customer_review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer_review $customer_review, $id)
    {
        $avis = Customer_review::find($id);
        $avis->delete();

        return redirect('/avis')->with('success', 'avis bien supprimé');
    }
}
