<?php

namespace App\Services;

use App\Models\Menu;

class NavigationService
{
    public function getNavigation()
    {
        $links = Menu::with('children')->where('parent_id', '=', '0')->orderBy('sort_order')->get();
        $navigation = [];
        foreach ($links as $link) {
            $navigation[] = [
                'text' => $link->menu_title,
                'url' => $link->slug,
                'id' => $link->id,
                'link' => $link->is_link,
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
                'text' => $child->menu_title,
                'url' => $child->slug,
                'id' => $child->id,
                'link' => $child->is_link,
                'children' => $this->getChildLinks($child->children)
            ];
        }

        return $childLinks;
    }
}