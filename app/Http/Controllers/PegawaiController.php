<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Pegawai;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StorePegawaiRequest;
use App\Http\Requests\UpdatePegawaiRequest;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (Auth::check()) {
            // Check if the authenticated user is also in the pegawai table...
            $user = Auth::user();
            $pegawai = Pegawai::where('user_id', $user->id)->first();
            if ($pegawai) {

                // The authenticated user is in the pegawai table, so show the page...
                return view('admin.dashboard');
            }
        }
        Session::flash('message', 'You must be a pegawai to view this page.');
        Session::flash('alert-type', 'warning');

        // The user is not authenticated or is not in the pegawai table, so redirect to the login page...
        return redirect('/home');
        ?>
        <script>
            Swal.fire({
            title: 'Warning',
            text: '<%= session[:message] %>',
            icon: 'warning'
            });
        </script>
        <?php

    }

    public function getPegawai(){
        $pegawai = new Pegawai();
        $data = [
            'pegawai' => $pegawai->getAllPegawai()
        ];
        return view('admin.users.pegawai', $data);
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
     * @param  \App\Http\Requests\StorePegawaiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePegawaiRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show(Pegawai $pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit(Pegawai $pegawai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePegawaiRequest  $request
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePegawaiRequest $request, Pegawai $pegawai)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pegawai $pegawai)
    {
        //
    }
}
