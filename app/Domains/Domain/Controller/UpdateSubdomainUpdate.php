<?php declare(strict_types=1);

namespace App\Domains\Domain\Controller;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class UpdateSubdomainUpdate extends ControllerAbstract
{
    /**
     * @param int $id
     * @param int $subdomain_id
     *
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function __invoke(int $id, int $subdomain_id): Response|RedirectResponse
    {
        $this->row($id);
        $this->subdomain($subdomain_id);

        if ($response = $this->actionPost('update')) {
            return $response;
        }

        $this->meta('title', $this->row->host.' - '.$this->subdomain->host);

        $this->request->merge($this->request->input() + $this->subdomain->toArray());

        return $this->page('domain.update-subdomain-update', [
            'row' => $this->row,
            'subdomain' => $this->subdomain,
        ]);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function update(): RedirectResponse
    {
        $this->factory('Subdomain', $this->subdomain)->action()->update();

        $this->sessionMessage('success', __('domain-update-subdomain-update.success'));

        return redirect()->route('domain.update.subdomain.update', [$this->row->id, $this->subdomain->id]);
    }
}
