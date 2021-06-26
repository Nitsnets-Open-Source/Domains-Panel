<?php declare(strict_types=1);

namespace App\Domains\Domain\Controller;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class UpdateUrlUpdate extends ControllerAbstract
{
    /**
     * @param int $id
     * @param int $domain_url_id
     *
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function __invoke(int $id, int $domain_url_id): Response|RedirectResponse
    {
        $this->row($id);
        $this->url($domain_url_id);

        if ($response = $this->actionPost('update')) {
            return $response;
        }

        $this->filters();

        $this->request->merge($this->request->input() + $this->url->toArray());

        $this->meta('title', $this->row->host.' - '.$this->url->url);

        return $this->page('domain.update-url-update', [
            'row' => $this->row,
            'url' => $this->url,
            'checks' => $this->url->checks()->filter($this->request->input())->get(),
            'filters' => $this->request->input(),
        ]);
    }

    /**
     * @return void
     */
    protected function filters(): void
    {
        $this->request->merge([
            'limit' => (int)$this->request->input('limit', 500),
            'start_at' => (string)$this->request->input('start_at'),
            'end_at' => (string)$this->request->input('end_at'),
            'error' => (bool)$this->request->input('error'),
            'sort' => (string)$this->request->input('sort', 'date'),
        ]);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function update(): RedirectResponse
    {
        $this->factory('Url', $this->url)->action()->update();

        $this->sessionMessage('success', __('domain-update-url-update.success'));

        return redirect()->route('domain.update.url.update', [$this->row->id, $this->url->id]);
    }
}
