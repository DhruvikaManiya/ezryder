@extends('layouts.delivery_boy')


@section('content')
   <div class="main-container" id="doc1">
      <article class="topNav">
        <h2><img src="{{ asset('asset/images/leftArrow.png') }}" />Documents</h2>
      </article>
      <h1 class="h1-type1 padding-lr">Your ID Proof</h1>
      <form class="padding-lr form-type1">
        <article class="input-label-container1">
          <label for="document" class="label-type1">Select Type</label>
          <select name="document" id="document" class="select-type1">
            <option value="" selected>Select Document type</option>
          </select>
        </article>
        <article class="input-label-container1">
          <label for="frontDoc" class="label-type1">Upload Front of document</label>
          <input
            type="text"
            name="frontDoc"
            id="frontDoc"
            class="input-type1"
            placeholder="Upload"
          />
        </article>
        <article class="input-label-container1">
          <label for="backDoc" class="label-type1">Upload Back of document</label>
          <input
            type="text"
            class="input-type1"
            name="backDoc"
            id="backDoc"
            placeholder="Upload"
          />
        </article>

        <button class="btn-type2 btn-darkBlue">Save</button>
      </form>
    </div>
@endsection
