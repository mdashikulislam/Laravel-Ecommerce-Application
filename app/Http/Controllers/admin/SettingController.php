<?php

namespace App\Http\Controllers\admin;

use App\admin\setting\Footer;
use App\admin\setting\HeaderTop;
use App\admin\setting\partner;
use App\admin\TestiMonial;
use App\Setting;
use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $header_top = HeaderTop::all()->first();
        $slider = Slider::all();
        $testimonial = TestiMonial::all();
        $footer = Footer::all()->first();
        $partner = partner::all();
        return view('admin.setting.index')->with([
            'header_top'=>$header_top,
            'sliders'=>$slider,
            'testimonials'=>$testimonial,
            'footer'=>$footer,
            'partners'=>$partner
        ]);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function visibility(Request $request){
        $setting =Setting::find(1);
        $setting->header_top = $request->header_top;
        $setting->header = $request->header;
        $setting->slider = $request->slider;
        $setting->save();
        return redirect()->back()->with([
            'msg'=>'Visibility update successfully'
        ]);
    }

    public function headerTop($id,Request $request)
    {
        $this->validate($request,[
            'phone'=>'required',
            'email'=>'required',
            'text'=>'required'
        ]);
        $headerTop = HeaderTop::where(['id'=>$id])->first();
        $headerTop->phone = $request->phone;
        $headerTop->email = $request->email;
        $headerTop->text = $request->text;
        $headerTop->save();
        return redirect()->back()->with([
            'msg'=>'Header Top update Successfully'
        ]);
    }

    public function slider(Request $request)
    {
        $this->validate($request,[
            'heading'=>'required',
            'paragraph'=>'required',
            'image'=>'required'
        ]);

        if ($request->hasFile('image')){
           $imagename =  $request->image->store('public');
           $slider = new Slider();
           $slider->heading = $request->heading;
           $slider->paragraph = $request->paragraph;
           $slider->image = $imagename;
           $slider->save();
           return redirect()->back()->with([
               'msg'=>'Silder Added Successfully'
           ]);
        }else{
            return redirect()->back()->with([
                'err'=>'Silder Not Added Successfully'
            ]);
        }

    }

    public function editSlider($id,Request $request)
    {
        $this->validate($request,[
            'heading'=>'required',
            'paragraph'=>'required'
        ]);
        if ($request->chkbox == '1'){
            $this->validate($request,[
                'image'=>'required'
            ]);
            $imagename =  $request->image->store('public');
            $slider = Slider::find($id);
            $slider->heading = $request->heading;
            $slider->paragraph = $request->paragraph;
            $slider->image = $imagename;
            $slider->save();
            return redirect()->back()->with([
                'msg'=>'Silder Added Successfully'
            ]);
        }else{

            $slider = Slider::find($id);
            $slider->heading = $request->heading;
            $slider->paragraph = $request->paragraph;
            $slider->save();
            return redirect()->back()->with([
                'msg'=>'Silder Added Successfully'
            ]);
        }
    }
    public function sliderDelete($id)
    {
        $image = Slider::where(['id'=>$id])->first();
        $img =\Storage::delete([$image->image]);
        $slider = Slider::where(['id'=>$id])->delete();
       return redirect()->back()->with([
            'msg'=>'Slider Delete Successfully'
        ]);
    }

    public function editTestimonial($id,Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'designation'=>'required',
            'comment'=>'required'
        ]);
        if ($request->chkbox == '1'){
            $this->validate($request,[
                'image'=>'required'
            ]);
            $imagename =  $request->image->store('public');
            $testiMonial = TestiMonial::find($id);
            $testiMonial->name = $request->name;
            $testiMonial->designation = $request->designation;
            $testiMonial->comment = $request->comment;
            $testiMonial->image = $imagename;
            $testiMonial->save();
            return redirect()->back()->with([
                'msg'=>'Silder Update Successfully'
            ]);
        }else{
            $testiMonial = TestiMonial::find($id);
            $testiMonial->name = $request->name;
            $testiMonial->designation = $request->designation;
            $testiMonial->comment = $request->comment;
            $testiMonial->save();
            return redirect()->back()->with([
                'msg'=>'Silder Update Successfully'
            ]);
        }

    }

    public function testimonial(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'designation'=>'required',
            'image'=>'required',
            'comment'=>'required'
        ]);

        if ($request->hasFile('image')){
            $imagename =  $request->image->store('public');
            $testiMonial = new TestiMonial();
            $testiMonial->name = $request->name;
            $testiMonial->designation = $request->designation;
            $testiMonial->comment = $request->comment;
            $testiMonial->image = $imagename;
            $testiMonial->save();
            return redirect()->back()->with([
                'msg'=>'Testimonial Added Successfully'
            ]);
        }else{
            return redirect()->back()->with([
                'err'=>'Testimonial Not Added Successfully'
            ]);
        }
    }

    public function testimonialDelete($id)
    {
        $image = TestiMonial::where(['id'=>$id])->first();
        $img =\Storage::delete([$image->image]);
        $testimonial = TestiMonial::where(['id'=>$id])->delete();
        return redirect()->back()->with([
            'msg'=>'TestiMonial Delete Successfully'
        ]);
    }

    public function footer($id,Request $request){
        $this->validate($request,[
            'logoname'=>'required',
            'desc'=>'required',
            'address'=>'required',
            'copyright'=>'required'
        ]);
        $footer = Footer::where(['id'=>$id])->first();
        $footer->logoname = $request->logoname;
        $footer->desc = $request->desc;
        $footer->address = $request->address;
        $footer->copyright = $request->copyright;

        $footer->save();
        return redirect()->back()->with([
            'msg'=>'Footer update Successfully'
        ]);

    }

    public function partnerCreate(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'image'=>'required'
        ]);
        if ($request->hasFile('image')){
            $imagename =  $request->image->store('public');
            $partner = new partner();
            $partner->name = $request->name;
            $partner->image = $imagename;
            $partner->save();
            return redirect()->back()->with([
                'msg'=>'partner Added Successfully'
            ]);
        }else{
            return redirect()->back()->with([
                'err'=>'partner Not Added Successfully'
            ]);
        }
    }

    public function partnerDelete($id)
    {
        $partner = partner::where(['id'=>$id])->first();
        $img =\Storage::delete([$partner->image]);
        $partners = partner::where(['id'=>$id])->delete();
        return redirect()->back()->with([
            'msg'=>'Partner Delete Successfully'
        ]);
    }

    public function partnerEdit($id,Request $request)
    {
        $this->validate($request,[
            'name'=>'required'
        ]);
        if ($request->chkbox == '1'){
            $this->validate($request,[
                'image'=>'required'
            ]);
            $imagename =  $request->image->store('public');
            $partner = partner::find($id);
            $partner->name = $request->name;
            $partner->image = $imagename;
            $partner->save();
            return redirect()->back()->with([
                'msg'=>'Partner Update Successfully'
            ]);
        }else{
            $partner = partner::find($id);
            $partner->name = $request->name;
            $partner->save();
            return redirect()->back()->with([
                'msg'=>'Partner Update Successfully'
            ]);
        }
    }
}
