<?php
namespace spec\Fixtures\TestApp\App\Controllers;
use Stardust\Controller\BaseController;

class FixtureController extends BaseController {
    public function create() {
        echo "Create Action";
    }

    public function delete() {
        echo "Delete Action";
    }

    public function update() {
        echo "Update Action";
    }

    public function custom() {
        echo "Custom Action";
    }

    private function privateMethod() {
        echo "I'm private";
    }
}
