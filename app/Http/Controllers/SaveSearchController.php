<?php

namespace Suuty\Http\Controllers;

use Illuminate\Http\Request;
use Suuty\SaveSearch;

class SaveSearchController extends Controller
{
      public function __construct()
      {
          $this->middleware('auth');
          $this->middleware('isVerified');
      }

      /**
       * Remove the specified resource from storage.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function destroy($id)
      {
          $savesearch = SaveSearch::find($id);
          $savesearch->delete();
          return redirect('/');
      }
}
