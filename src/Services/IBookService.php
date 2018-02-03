<?php

namespace Jhp\BookCrud\Services;

interface IBookService
{
    public function paginate();
    public function find($id);
    public function store($data);
    public function update($id, $data);
    public function destroy($id);
}
