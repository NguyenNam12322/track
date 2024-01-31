<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatepostAPIRequest;
use App\Http\Requests\API\UpdatepostAPIRequest;
use App\Models\post;
use App\Repositories\postRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class postController
 * @package App\Http\Controllers\API
 */

class postAPIController extends AppBaseController
{
    /** @var  postRepository */
    private $postRepository;

    public function __construct(postRepository $postRepo)
    {
        $this->postRepository = $postRepo;
    }

    /**
     * Display a listing of the post.
     * GET|HEAD /posts
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $posts = $this->postRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($posts->toArray(), 'Posts retrieved successfully');
    }

    /**
     * Store a newly created post in storage.
     * POST /posts
     *
     * @param CreatepostAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatepostAPIRequest $request)
    {
        $input = $request->all();

        $post = $this->postRepository->create($input);

        return $this->sendResponse($post->toArray(), 'Post saved successfully');
    }

    /**
     * Display the specified post.
     * GET|HEAD /posts/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var post $post */
        $post = $this->postRepository->find($id);

        if (empty($post)) {
            return $this->sendError('Post not found');
        }

        return $this->sendResponse($post->toArray(), 'Post retrieved successfully');
    }

    /**
     * Update the specified post in storage.
     * PUT/PATCH /posts/{id}
     *
     * @param int $id
     * @param UpdatepostAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatepostAPIRequest $request)
    {
        $input = $request->all();

        /** @var post $post */
        $post = $this->postRepository->find($id);

        if (empty($post)) {
            return $this->sendError('Post not found');
        }

        $post = $this->postRepository->update($input, $id);

        return $this->sendResponse($post->toArray(), 'post updated successfully');
    }

    /**
     * Remove the specified post from storage.
     * DELETE /posts/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var post $post */
        $post = $this->postRepository->find($id);

        if (empty($post)) {
            return $this->sendError('Post not found');
        }

        $post->delete();

        return $this->sendSuccess('Post deleted successfully');
    }
}
