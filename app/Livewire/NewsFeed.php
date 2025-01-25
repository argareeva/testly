<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class NewsFeed extends Component
{
    protected string $apiKey;
    private string $endpoint;

    public $categories = [
        'web development' => 'web development',
        'technology' => 'technology',
        'science' => 'science',
        'business' => 'business',
        'entertainment' => 'entertainment',
    ];
    public string $selectedCategory = 'web development';
    public string $news ;
    public string $url;
    public string $author;
    public string $urlToImage;

    public function fetchNews(): void
    {
        $this->endpoint = "https://newsapi.org/v2/everything?q={$this->selectedCategory}";

        try {
            $response = Http::withHeaders([
                "X-API-Key" => $this->apiKey,
            ])->get($this->endpoint);

            if ($response->successful()) {
                $data = json_decode($response->body(), true);
                $randomArticle = $data['articles'][array_rand($data['articles'])];

                $this->news = $randomArticle['title'];
                $this->url = $randomArticle['url'];
                $this->author = $randomArticle['author'];
                $this->urlToImage = $randomArticle['urlToImage'];
            } else {
                throw new \Exception;
            }
        } catch (\Exception $e) {
            $this->news = "Modern Web Application 2 - From MVP to Deployed App";
            $this->url = "https://harbour.space/computer-science/courses/modern-web-application-2-nico-deblauwe-1208";
            $this->author = "Albina Gareeva";
            $this->urlToImage = "https://media.licdn.com/dms/image/v2/D4E0BAQFZs1kC3ApnLA/company-logo_200_200/company-logo_200_200/0/1688381710011/harbour_space_logo?e=1746057600&v=beta&t=LbNnnfo5HEOPDZZOYGsk70iQzEvCtytMBafRPYeqMmE";
        }
    }

    public function updateCategory()
    {
        $this->apiKey = config('services.api-key');
        $this->fetchNews();
    }

    public function render()
    {
        return view('livewire.news-feed');
    }
}
