<?php declare(strict_types=1);

namespace App\Domains\Domain\Controller;

use Illuminate\Http\Response;

class UpdateCheck extends ControllerAbstract
{
    /**
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(int $id): Response
    {
        $this->row($id);
        $this->filters();

        $this->meta('title', $this->row->host);

        return $this->page('domain.update-check', [
            'row' => $this->row,
            'filters' => $this->request->input(),
            'checks' => $this->row->checks()->list()->filter($this->request->input())->paginate(25),
        ]);
    }

    /**
     * @return void
     */
    protected function filters(): void
    {
        $this->request->merge([
            'search' => (string)$this->request->input('search'),
            'start_at' => (string)$this->request->input('start_at'),
            'end_at' => (string)$this->request->input('end_at'),
            'error' => (bool)$this->request->input('error'),
            'type' => $this->request->input('type', ''),
        ]);
    }
}
