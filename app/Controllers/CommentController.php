<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BlogModel;
use App\Models\CommentModel;
use CodeIgniter\HTTP\ResponseInterface;
use Hermawan\DataTables\DataTable;

class CommentController extends BaseController
{
    protected $m_comment;
    protected $m_blog;
    public function __construct()
    {
        $this->m_comment = new CommentModel();
        $this->m_blog = new BlogModel();
    }

    public function index()
    {
        return view('comment/index', [
            'title' => 'Comment Blog',
            'blogs' => $this->m_blog->findAll()
        ]);
    }

    public function save()
    {
        $id = $this->request->getPost('id');
        $blog = $this->request->getPost('blog');
        $comment = $this->request->getPost('comment');
        $data = [
            'blog_id' => $blog,
            'comment' => $comment,
            'user_id' => session('user_id')
        ];

        if ($id) {
            $data['id'] = $id;
        }
        $save = $this->m_comment->save($data);
        if ($save) {
            return redirect()->to(base_url('comment'))->with('alert_success', 'Berhasil menyimpan comment');
        }
        return redirect()->to(base_url('comment'))->with('alert_error', 'Gagal menyimpan comment');
    }

    public function datatableComment()
    {
        $data = $this->m_comment
            ->select('blogs.title, comments.comment, comments.id')
            ->join('blogs', 'blogs.id=comments.blog_id')
            ->where('comments.deleted_at', null)
            ->orderBy('comments.created_at', 'desc');
        return DataTable::of($data)
            ->addNumbering('number')
            ->add('action', function ($row) {
                return "
                <button class='btn btn-info edit' data-id='{$row->id}'>Edit</button>
                <button class='btn btn-danger delete' data-id='{$row->id}'>Delete</button>
                ";
            })
            ->toJson(true);
    }

    public function ajaxComment($id)
    {
        return response()->setJSON([
            'data' => $this->m_comment->find($id)
        ]);
    }

    public function delete()
    {
        try {
            $id = $this->request->getPost('id');
            $this->m_comment->delete($id);
            return $this->response->setJSON([
                'status' => true
            ]);
        } catch (\Throwable $th) {
            return $this->response->setJSON([
                'status' => false,
                'message' => $th->getMessage()
            ]);
        }
    }
}
