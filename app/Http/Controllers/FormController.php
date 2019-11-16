<?php

namespace App\Http\Controllers;

use App\Exports\FormExport;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Illuminate\Http\Request;
use App\Form;
use App\Bidang;
use App\Form_Field;
use App\Form_Jawaban;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function public($id)
    {
        
        if ($form = Form::where('id', $id)->first()) {
            // dd($form);
            $form_field = Form_Field::where('form_id', $id)->first();
            $form_field_q['nama_field'] = json_decode($form_field->nama_field, true);
            $form_field_q['contoh_jawaban'] = json_decode($form_field->contoh_jawaban, true);
        } else {
            abort(404);
        }
        return view('form.form',['form' => $form, 'form_field' => $form_field_q, 'form_f' => $form_field]);

    }
    public function publicinput(Request $request, $id)
    {
        if ( Form_Jawaban::where('form_id',$id)->first()  === null ) {
            $form_jaw = new Form_Jawaban;
            $nama_form = $request->nama_form;

            for ($i=0; $i < $request->jumlah_field; $i++) { 
                $key = $nama_form . $i;
                $arraydata_key[$i] = $request->$key;
            }
            $form_jaw->form_id = $id;
            $form_jaw->jumlah_data += 1;
            $data_input = array($arraydata_key);
            $form_jaw->jawaban_field = json_encode($data_input);
            $form_jaw->save();
        } else {
            $form_jaw = Form_Jawaban::where('form_id',$id)->first();
            $nama_form = $request->nama_form;

            for ($i=0; $i < $request->jumlah_field; $i++) { 
                $key = $nama_form . $i;
                $arraydata_key[$i] = $request->$key;
            }
            $form_jaw->form_id = $id;
            $form_jaw->jumlah_data += 1;
            $data_input = array($arraydata_key);
            $arraydata = array_merge(json_decode($form_jaw->jawaban_field, true), $data_input);
            $form_jaw->jawaban_field = json_encode($arraydata);
            $form_jaw->save();
        }
        // $data_input = array($arraydata_key);
        // $arraydata = array_merge($data_input, $data_input);

        // dd($form_jaw);
        return redirect()->back()->with('success','Data Berhasil Diinput, Terima Kasih!');
    }

    public function index($bidang)
    {
        if($bidang == 'BPH' || $bidang == 'Internal' || $bidang == 'Relasi' ||
        $bidang == 'Sospol' || $bidang == 'MEDINFO' || $bidang == 'Ekraf'){
            $bidang_id = Bidang::where('bidang', $bidang)->first();
            $form_a = Form::where('bidang_id', $bidang_id->id)->get();
            $form = $form_a->sortByDesc('id');
            $form_jaw = Form_Jawaban::all();
            $looping = 0;
            foreach ($form as $form_b) {
                $id[$looping] = $form_b->id;
                $form_jaw_b = Form_Field::where('form_id',$id[$looping])->first();
                if ($form_jaw_b === null) {
                    $form_c = Form::find($id[$looping]);
                    $form_c->delete();
                }
                $looping += 1;
            }
        }
        else {
            abort(404);
        }
        
        return view('form.index', ['form' => $form, 'form_jawaban' => $form_jaw, 'bidang' => $bidang]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createform(Request $request, $bidang)
    {
        if($bidang == 'BPH' || $bidang == 'Internal' || $bidang == 'Relasi' ||
        $bidang == 'Sospol' || $bidang == 'MEDINFO' || $bidang == 'Ekraf'){
            $form = new Form;
            $form->nama_form = $request->nama_form;
            $form->bidang_id = $request->bidang;
            $form->jumlah_field = $request->jumlah;
            $form->save();
        }
        else {
            abort(404);
        }

        return view ( 'form.create',['jumlah_field' => $request->jumlah, 'nama_form' => $request->nama_form, 'bidang' => $bidang,
        'form_id' => $form->id ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeform(Request $request,$bidang)
    {
        // dd($request);
        if($bidang == 'BPH' || $bidang == 'Internal' || $bidang == 'Relasi' ||
        $bidang == 'Sospol' || $bidang == 'MEDINFO' || $bidang == 'Ekraf'){
            
            $form_field = new Form_Field;

            $contoh_form = $request->contoh_form;
            $nama_form = $request->nama_form;
            $nama_form = preg_replace('/\s+/', '_', $nama_form);


            for ($i=0; $i < $request->jumlah_field ; $i++) {
                $contoh_key = $contoh_form . $i;
                $key = $nama_form . $i;
                $arraydata_contoh[$i] = $request->$contoh_key;
                $arraydata_key[$i] = $request->$key;
                
            }

            $form_field->form_id = $request->form_id;
            $form_field->nama_field = json_encode($arraydata_key);
            $form_field->contoh_jawaban = json_encode($arraydata_contoh);
            $form_field->save();
            // dd($form_field->contoh_jawaban);
            
        }
        else {
            abort(404);
        }
        return redirect('/admin'.'/'.$bidang.'/Form')->with('success','Form Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($bidang,$id)
    {
        if($bidang == 'BPH' || $bidang == 'Internal' || $bidang == 'Relasi' ||
        $bidang == 'Sospol' || $bidang == 'MEDINFO' || $bidang == 'Ekraf'){
            $form = Form::findOrFail($id);
            $form_field = Form_Field::where('form_id',$id)->first();
            $form_field_q['nama_field'] = json_decode($form_field->nama_field, true);
            $form_field_q['contoh_jawaban'] = json_decode($form_field->contoh_jawaban, true);
        }
        else {
            abort(404);
        }
        return view ( 'form.edit',['form' => $form,'jumlah_field' => $form->jumlah_field, 'nama_form' => $form->nama_form,
         'bidang' => $bidang, 'form_id' => $form->id, 'form_field' => $form_field_q]);
        // dd($form_field_q);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$bidang,$id)
    {
        if($bidang == 'BPH' || $bidang == 'Internal' || $bidang == 'Relasi' ||
        $bidang == 'Sospol' || $bidang == 'MEDINFO' || $bidang == 'Ekraf'){
            $form_field = Form_Field::where('form_id',$id)->first();

            $contoh_form = $request->contoh_form;
            $nama_form = $request->nama_form;
            $nama_form = preg_replace('/\s+/', '_', $nama_form);

            for ($i=0; $i < $request->jumlah_field ; $i++) {
                $contoh_key = $contoh_form . $i;
                $key = $nama_form . $i;
                $arraydata_contoh[$i] = $request->$contoh_key;
                $arraydata_key[$i] = $request->$key;
                
            }

            $form_field->form_id = $request->form_id;
            $form_field->nama_field = json_encode($arraydata_key);
            $form_field->contoh_jawaban = json_encode($arraydata_contoh);
            $form_field->save();
            // $arraydata = $arraydata_key + $arraydata_key;
            // $arraydata = array_merge($arraydata_key, $arraydata_contoh);
            // dd($arraydata);
        }
        else {
            abort(404);
        }
        
        return redirect('/admin'.'/'.$bidang.'/Form')->with('success','Form Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$bidang)
    {
        if($bidang == 'BPH' || $bidang == 'Internal' || $bidang == 'Relasi' ||
        $bidang == 'Sospol' || $bidang == 'MEDINFO' || $bidang == 'Ekraf'){
            $form_jaw = Form_Jawaban::where('form_id',$request->id)->first();
            $form_jaw->delete();
            $form_field = Form_Field::where('form_id',$request->id)->first();
            $form_field->delete();
            $form = Form::where('id',$request->id)->first();
            $form->delete();
        }
        else {
            abort(404);
        }
        return redirect()->back()->with('warning','Form Berhasil Dihapus!');
    }

    // RESPONSE FUNCTION //
    public function responseshow($bidang,$id)
    {
        if($bidang == 'BPH' || $bidang == 'Internal' || $bidang == 'Relasi' ||
        $bidang == 'Sospol' || $bidang == 'MEDINFO' || $bidang == 'Ekraf'){
            $form = Form::findOrFail($id);
            $form_field = Form_Field::where('form_id', $form->id)->first();
            $form_jaw = Form_Jawaban::where('form_id', $form->id)->first();
            if ($form_jaw === null) {
                for ($i=0; $i < $form->jumlah_field; $i++) { 
                    $form_jaw_w[0][$i] = "null";
                }   
                $a_form_jaw = json_encode($form_jaw_w);
                $a_form_field = $form_field->nama_field;

            } else {
                $a_form_field = $form_field->nama_field;
                $a_form_jaw = $form_jaw->jawaban_field;
            }
            // dd($form_jaw_q);
            $form_field_q['nama_field'] = json_decode($a_form_field, true);
            $form_jaw_q['jawaban_field'] = json_decode($a_form_jaw, true);
            
        }
        else {
            abort(404);
        }
        // $lala = gettype($form);
        // dd($form_jaw_q);
        return view('form.response', ['form' => $form, 'bidang' => $bidang, 'form_jawaban' => $form_jaw_q,
         'form_field' => $form_field_q, 'jumlah' => $form->jumlah_field]);
    }

    public function exportexcel($bidang,$id)
    {
        if($bidang == 'BPH' || $bidang == 'Internal' || $bidang == 'Relasi' ||
        $bidang == 'Sospol' || $bidang == 'MEDINFO' || $bidang == 'Ekraf'){
            $form = Form::findOrFail($id);
            $form_field = Form_Field::where('form_id', $form->id)->first();
            $form_jaw = Form_Jawaban::where('form_id', $form->id)->first();

        }
        else {
            abort(404);
        }
        $data = json_decode($form_jaw->jawaban_field, true);
        $header = json_decode($form_field->nama_field,true);
        $export = new FormExport($data, $header);
        // dd($header);
        return Excel::download($export, $form->nama_form.' (Tanggapan)'.'.xlsx');
    }
}
