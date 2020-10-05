<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSliderRequest;
use App\Http\Requests\UpdateSliderRequest;
use App\Repositories\SliderRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use Illuminate\Support\Facades\Storage;
use App\Models\Slider;

class SliderController extends AppBaseController
{
    /** @var  SliderRepository */
    private $sliderRepository;

    public function __construct(SliderRepository $sliderRepo)
    {
        $this->sliderRepository = $sliderRepo;
    }

    /**
     * Display a listing of the Slider.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $sliders = $this->sliderRepository->all();

        return view('sliders.index')
            ->with('sliders', $sliders);
    }

    /**
     * Show the form for creating a new Slider.
     *
     * @return Response
     */
    public function create()
    {
     //
    }

    /**
     * Store a newly created Slider in storage.
     *
     * @param CreateSliderRequest $request
     *
     * @return Response
     */
    public function store(CreateSliderRequest $request)
    {
        $input = $request->all();
        // handle file upload
        if ($request->hasFile('photo')) {
        //  get filename with extensions
        $filenameWithExt=$request->file('photo')->getClientOriginalName();
        // get file name
        $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
         // get the extension
        $extension=$request->file('photo')->getClientOriginalExtension();
        // file name to store
        $fileNameToStore=$filename.'_'.time().'.'.$extension;
        //upload image
        $path=$request->file('photo')->storeAs('public/sliders',$fileNameToStore);
        }else{
            $fileNameToStore='noimage.jpg';
        }

        $slider= new Slider;
        $slider->photo=$fileNameToStore;
        $slider->save();
        Flash::success('Slider saved successfully.');

        return redirect(route('sliders.index'));
    }

    /**
     * Display the specified Slider.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
       //
    }

    /**
     * Show the form for editing the specified Slider.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified Slider in storage.
     *
     * @param int $id
     * @param UpdateSliderRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSliderRequest $request)
    {
       //
    }

    /**
     * Remove the specified Slider from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $slider = $this->sliderRepository->find($id);

        if (empty($slider)) {
            Flash::error('Slider not found');

            return redirect(route('sliders.index'));
        }

        $this->sliderRepository->delete($id);
        if ($slider->photo != 'noimage.jpg') {
            // delete the image
            Storage::delete('public/sliders/'.$slider->photo);
  
          }
        Flash::success('Slider deleted successfully.');

        return redirect(route('sliders.index'));
    }
}
