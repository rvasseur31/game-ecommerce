<?php

namespace App\Http\Controllers;

use App\Customer_review;
use App\Platform;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerReviewController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('admin.customer-review.index')
            ->with('platforms', Platform::all())
            ->with('customerReviews', Customer_review::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.customer-review.create');
    }

    public function confirmCustomerReview($customerReview) {
        $currentCustomerReview = Customer_review::find($customerReview);
        $currentCustomerReview->validated = true;
        $currentCustomerReview->save();
        return redirect(route('admin-customer-review.index'))->with('success', 'Avis modifié avec succès !');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $inputs = $request->except('_token');
        $user = Auth::id();
        $customerReview = new Customer_review();
        foreach ($inputs as $key => $value) {
            $customerReview->$key = $value;
        }
        $customerReview->user_id = Auth::id();
        $customerReview->save();
        if (Auth::user()->administrator) {
            return redirect(route('admin-customer-review.index'))->with('success', 'Avis enregistré avec succès !');
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  integer  $customerReview
     * @return \Illuminate\Http\Response
     */
    public function show($customerReview) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  integer  $platform
     * @return \Illuminate\Http\Response
     */
    public function edit($customerReview) {
        return view('admin.customer-review.edit')
        ->with('customerReview', Customer_review::find($customerReview));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  integer  $platform
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $customerReview) {
        $inputs = $request->except('_token', '_method');
        $customerReview = Customer_review::find($customerReview);
        foreach ($inputs as $key => $value) {
            $customerReview->$key = $value;
        }
        $customerReview->save();
        if (Auth::user()->administrator) {
            return redirect(route('admin-customer-review.index'))->with('success', 'Avis mis à jour avec succès !');
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  integer  $platform
     * @return \Illuminate\Http\Response
     */
    public function destroy($customerReview) {
        $customerReview = Customer_review::find($customerReview);
        $customerReview->delete();

        return redirect(route('admin-customer-review.index'))->with('success', 'avis supprimé avec succès !');
    }
}