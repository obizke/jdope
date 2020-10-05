<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTrendsRequest;
use App\Http\Requests\UpdateTrendsRequest;
use App\Repositories\TrendsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Trends;
use Illuminate\Support\Facades\Storage;

class TrendsController extends AppBaseController
{
    /** @var  TrendsRepository */
    private $trendsRepository;

    public function __construct(TrendsRepository $trendsRepo)
    {
        $this->trendsRepository = $trendsRepo;
    }

    /**
     * Display a listing of the Trends.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $trends = $this->trendsRepository->all();
        return view('trends.index')
            ->with('trends', $trends);
    }

    /**
     * Show the form for creating a new Trends.
     *
     * @return Response
     */
    public function create()
    {
        return view('trends.create');
    }

    /**
     * Store a newly created Trends in storage.
     *
     * @param CreateTrendsRequest $request
     *
     * @return Response
     */
    public function store(CreateTrendsRequest $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'photo'=>'image|nullable|max:4999'
        ]);
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
          $path=$request->file('photo')->storeAs('public/trends',$fileNameToStore);
        }else{
          $fileNameToStore='noimage.jpg';
        }
        // saving to the database
        $trends =new Trends;
        $trends ->name=$request->input('name');
        $trends->photo=$fileNameToStore;
        $trends->save();
        Flash::success('Trends saved successfully.');

        return redirect(route('trends.index'));
    }

    /**
     * Display the specified Trends.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $trends = $this->trendsRepository->find($id);

        if (empty($trends)) {
            Flash::error('Trends not found');

            return redirect(route('trends.index'));
        }

        return view('trends.show')->with('trends', $trends);
    }

    /**
     * Show the form for editing the specified Trends.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $trends = $this->trendsRepository->find($id);

        if (empty($trends)) {
            Flash::error('Trends not found');

            return redirect(route('trends.index'));
        }

        return view('trends.edit')->with('trends', $trends);
    }

    /**
     * Update the specified Trends in storage.
     *
     * @param int $id
     * @param UpdateTrendsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTrendsRequest $request)
    {
        $trends = $this->trendsRepository->find($id);

        if (empty($trends)) {
            Flash::error('Trends not found');

            return redirect(route('trends.index'));
        }

        $trends = $this->trendsRepository->update($request->all(), $id);

        Flash::success('Trends updated successfully.');

        return redirect(route('trends.index'));
    }

    /**
     * Remove the specified Trends from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $trends = $this->trendsRepository->find($id);

        if (empty($trends)) {
            Flash::error('Trends not found');

            return redirect(route('trends.index'));
        }

        $this->trendsRepository->delete($id);
        if ($trends->photo != 'noimage.jpg') {
            // delete the image
            Storage::delete('public/trends/'.$trends->photo);
        }
        Flash::success('Trends deleted successfully.');

        return redirect(route('trends.index'));
    }
}
