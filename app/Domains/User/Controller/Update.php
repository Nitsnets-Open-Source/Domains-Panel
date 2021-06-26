<?php declare(strict_types=1);

namespace App\Domains\User\Controller;

use Illuminate\Http\RedirectResponse;

class Update extends ControllerAbstract
{
    /**
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function __invoke()
    {
        if ($response = $this->actionPost('update')) {
            return $response;
        }

        $this->request->merge($this->request->input() + $this->auth->toArray());

        $this->meta('title', __('user-update.meta-title'));

        return $this->page('user.update', [
            'row' => $this->auth,
        ]);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function update(): RedirectResponse
    {
        $this->action($this->auth)->update();

        $this->sessionMessage('success', __('user-update.success'));

        return redirect()->route('user.update');
    }
}
