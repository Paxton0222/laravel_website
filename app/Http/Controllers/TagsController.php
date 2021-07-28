<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTagsRequest;
use App\Http\Requests\UpdateTagsRequest;
use App\Repositories\TagsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class TagsController extends AppBaseController
{
    /** @var  TagsRepository */
    private $tagsRepository;

    public function __construct(TagsRepository $tagsRepo)
    {
        $this->tagsRepository = $tagsRepo;
    }

    /**
     * Display a listing of the Tags.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $tags = $this->tagsRepository->all();

        return view('tags.index')
            ->with('tags', $tags);
    }

    /**
     * Show the form for creating a new Tags.
     *
     * @return Response
     */
    public function create()
    {
        return view('tags.create');
    }

    /**
     * Store a newly created Tags in storage.
     *
     * @param CreateTagsRequest $request
     *
     * @return Response
     */
    public function store(CreateTagsRequest $request)
    {
        $input = $request->all();

        $tags = $this->tagsRepository->create($input);

        Flash::success('Tags saved successfully.');

        return redirect(route('tags.index'));
    }

    /**
     * Display the specified Tags.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tags = $this->tagsRepository->find($id);

        if (empty($tags)) {
            Flash::error('Tags not found');

            return redirect(route('tags.index'));
        }

        return view('tags.show')->with('tags', $tags);
    }

    /**
     * Show the form for editing the specified Tags.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tags = $this->tagsRepository->find($id);

        if (empty($tags)) {
            Flash::error('Tags not found');

            return redirect(route('tags.index'));
        }

        return view('tags.edit')->with('tags', $tags);
    }

    /**
     * Update the specified Tags in storage.
     *
     * @param int $id
     * @param UpdateTagsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTagsRequest $request)
    {
        $tags = $this->tagsRepository->find($id);

        if (empty($tags)) {
            Flash::error('Tags not found');

            return redirect(route('tags.index'));
        }

        $tags = $this->tagsRepository->update($request->all(), $id);

        Flash::success('Tags updated successfully.');

        return redirect(route('tags.index'));
    }

    /**
     * Remove the specified Tags from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tags = $this->tagsRepository->find($id);

        if (empty($tags)) {
            Flash::error('Tags not found');

            return redirect(route('tags.index'));
        }

        $this->tagsRepository->delete($id);

        Flash::success('Tags deleted successfully.');

        return redirect(route('tags.index'));
    }
}
