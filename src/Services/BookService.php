<?php

namespace Jhp\BookCrud\Services;

use Jhp\BookCrud\Services\IBookService;
use Jhp\BookCrud\Repositories\IBookRepository;



class BookService implements IBookService
{
    protected $repository;

    public function __construct(IBookRepository $repository)
    {
        return $this->repository = $repository;
    }

    public function paginate()
    {
        return $this->repository->paginate();
    }

    public function find($id)
    {
        return $this->repository->find($id);
    }

    public function store($data)
    {
        return $this->repository->store($data);
    }

    public function update($id, $data)
    {
        return $this->repository->update($id, $data);
    }

    public function destroy($id)
    {
        return $this->repository->destroy($id);
    }

}
