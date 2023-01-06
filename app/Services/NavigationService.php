<?php

namespace App\Services;

use App\Models\Menu;

class NavigationService
{
    public function getNavigation()
    {
        $links = Menu::with('children')->where('parent_id', '=', '0')->get();
        dd($links);
        $navigation = [];
        foreach ($links as $link) {
            $navigation[] = [
                'text' => $link->link_text,
                'url' => $link->url,
                'children' => $this->getChildLinks($link->children)
            ];
        }

        return $navigation;
    }

    protected function getChildLinks($children)
    {
        $childLinks = [];
        foreach ($children as $child) {
            $childLinks[] = [
                'text' => $child->link_text,
                'url' => $child->url,
                'children' => $this->getChildLinks($child->children)
            ];
        }

        return $childLinks;
    }
}