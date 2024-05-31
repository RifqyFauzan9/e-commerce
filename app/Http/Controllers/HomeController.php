<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use Illuminate\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(): View
    {
        $events = $this->fetchEvent();
        $categories = $this->fetchCategory();
        return view('frontend.index', compact('events', 'categories'));
    }

    // Fetch data event
    private function fetchEvent()
    {
        $category = request()->query('category');
        $event = Event::upcoming();

        // Limit event 6
        if (!request()->query('all_events')) {
            $event->limit(6);
        }
        if ($category) {
            $event->withCategory($category);
        }

        return $event->get();
    }

    // Fetch data Category
    private function fetchCategory()
    {
        $categories = Category::sortByMostEvents();
        // Limit category 4
        if (!request()->query('all_categories')) {
            $categories->limit(4);
        }
        return $categories->get();
    }
}
