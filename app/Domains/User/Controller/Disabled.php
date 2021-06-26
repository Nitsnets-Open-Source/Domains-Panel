<?php declare(strict_types=1);

namespace App\Domains\User\Controller;

class Disabled extends ControllerAbstract
{
    /**
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function __invoke()
    {
        if ($this->auth->enabled) {
            return redirect()->route('dashboard.index');
        }

        $this->actionCallClosure(fn () => $this->action()->logout());

        $this->meta('title', __('user-disabled.meta-title'));

        return $this->page('user.disabled');
    }
}
