<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Http;
use Illuminate\View\Component;

class News extends Component
{
    private string $endpoint;
    private string $api_key;

    public function __construct()
    {
        $this->endpoint = "https://newsapi.org/v2/everything?q=web development";
        $this->api_key = config('services.api-key');
    }

    private function getNews()
    {
        try {
            $response = Http::withHeaders([
                "X-API-Key" => $this->api_key
            ])->get($this->endpoint);

            if ($response->successful()) {
                $data = json_decode($response->body(), true);
                $randomArticle = $data["articles"][array_rand($data["articles"])];

                $news = $randomArticle["title"];
                $url = $randomArticle["url"];
                $author = $randomArticle["author"];
                $urlToImage = $randomArticle["urlToImage"];
            } else {
                throw new \Exception("");
            }

        } catch (\Exception $e) {
            $news = "Modern Web Application 2 - From MVP to Deployed App";
            $url = "https://harbour.space/computer-science/courses/modern-web-application-2-nico-deblauwe-1208";
            $author = "Albina Gareeva";
            $urlToImage = "https://media.licdn.com/dms/image/v2/D4E0BAQFZs1kC3ApnLA/company-logo_200_200/company-logo_200_200/0/1688381710011/harbour_space_logo?e=1746057600&v=beta&t=LbNnnfo5HEOPDZZOYGsk70iQzEvCtytMBafRPYeqMmE";
        }

        return [$news, $url, $author, $urlToImage];
    }

    public function render(): View|Closure|string
    {
        [$news, $url, $author, $urlToImage] = $this->getNews();

        return view('components.news', compact('news', 'url', 'author', 'urlToImage'));
    }

}
