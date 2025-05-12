<?php

namespace App\Http\Middleware;

use Closure;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use romanzipp\Seo\Structs\Link as LinkMeta;
use romanzipp\Seo\Structs\Meta;
use romanzipp\Seo\Structs\Meta\OpenGraph;
use romanzipp\Seo\Structs\Meta\Twitter;
use Spatie\SchemaOrg\DayOfWeek;
use Spatie\SchemaOrg\Schema;
use Symfony\Component\HttpFoundation\Response;

class AddSeoDefaults
{
    private readonly DateTimeZone $timeZone;

    public function __construct()
    {
        $this->timeZone = new DateTimeZone(config('app.local_timezone'));
    }

    public function handle(Request $request, Closure $next): Response
    {
        seo()->charset();

        seo()->viewport();

        seo()->csrfToken();

        seo()->canonical(str(url()->current())
            ->remove('index.php/')
            ->removeTrailingDoubleSlash());

        $this->includeFavicons();

        $this->includeOpenGraph();

        $this->includeTwitter();

        if ($request->routeIs('home')) {
            $this->includeHomeJsonLd();
        }

        return $next($request);
    }

    private function includeFavicons(): void
    {
        seo()->addMany([
            // Favicons
            LinkMeta::make()
                ->type('text/plain')
                ->rel('author')
                ->href(url(asset('humans.txt'))),

            LinkMeta::make()
                ->rel('apple-touch-icon-precomposed')
                ->attr('sizes', '57x57')
                ->href('/apple-touch-icon-57x57.png'),

            LinkMeta::make()
                ->rel('apple-touch-icon-precomposed')
                ->attr('sizes', '114x114')
                ->href('/apple-touch-icon-114x114.png'),

            LinkMeta::make()
                ->rel('apple-touch-icon-precomposed')
                ->attr('sizes', '72x72')
                ->href('/apple-touch-icon-72x72.png'),

            LinkMeta::make()
                ->rel('apple-touch-icon-precomposed')
                ->attr('sizes', '144x144')
                ->href('/apple-touch-icon-144x144.png'),

            LinkMeta::make()
                ->rel('apple-touch-icon-precomposed')
                ->attr('sizes', '60x60')
                ->href('/apple-touch-icon-60x60.png'),

            LinkMeta::make()
                ->rel('apple-touch-icon-precomposed')
                ->attr('sizes', '120x120')
                ->href('/apple-touch-icon-120x120.png'),

            LinkMeta::make()
                ->rel('apple-touch-icon-precomposed')
                ->attr('sizes', '76x76')
                ->href('/apple-touch-icon-76x76.png'),

            LinkMeta::make()
                ->rel('apple-touch-icon-precomposed')
                ->attr('sizes', '152x152')
                ->href('/apple-touch-icon-152x152.png'),

            LinkMeta::make()
                ->rel('icon')
                ->attr('sizes', '196x196')
                ->attr('type', 'image/png')
                ->href('/favicon-196x196.png'),

            LinkMeta::make()
                ->rel('icon')
                ->attr('sizes', '96x96')
                ->attr('type', 'image/png')
                ->href('/favicon-96x96.png'),

            LinkMeta::make()
                ->rel('icon')
                ->attr('sizes', '32x32')
                ->attr('type', 'image/png')
                ->href('/favicon-32x32.png'),

            LinkMeta::make()
                ->rel('icon')
                ->attr('sizes', '16x16')
                ->attr('type', 'image/png')
                ->href('/favicon-16x16.png'),

            LinkMeta::make()
                ->rel('icon')
                ->attr('sizes', '128x128')
                ->attr('type', 'image/png')
                ->href('/favicon-128.png'),

            Meta::make()
                ->name('application-name')
                ->content(config('website.name')),

            Meta::make()
                ->name('theme-color')
                ->content('#081728'),

            Meta::make()
                ->name('msapplication-TileColor')
                ->content('#FFFFFF'),

            Meta::make()
                ->name('msapplication-TileImage')
                ->content('/mstile-144x144.png'),

            Meta::make()
                ->name('msapplication-square70x70logo')
                ->content('/mstile-70x70.png'),

            Meta::make()
                ->name('msapplication-square150x150logo')
                ->content('/mstile-150x150.png'),

            Meta::make()
                ->name('msapplication-wide310x150logo')
                ->content('/mstile-310x150.png'),

            Meta::make()
                ->name('msapplication-square310x310logo')
                ->content('/mstile-310x310.png'),

        ]);
    }

    private function includeOpenGraph(): void
    {
        seo()->addMany([

            // OpenGraph
            OpenGraph::make()
                ->property('locale')
                ->content(app()->getLocale()),

            OpenGraph::make()
                ->property('site_name')
                ->content(config('website.name')),

            OpenGraph::make()
                ->property('type')
                ->content('website'),

            OpenGraph::make()
                ->property('url')
                ->content(str(url()->current())
                    ->remove('index.php/')
                    ->removeTrailingDoubleSlash()),
        ]);

    }

    private function includeTwitter(): void
    {
        seo()->add(
            Twitter::make()
                ->name('card')
                ->content('summary_large_image'),
        );

        if (config('website.social.x')) {

            seo()->add(
                Twitter::make()
                    ->name('site')
                    ->content(config('website.social.x'))
            );

        }
    }

    private function includeHomeJsonLd(): void
    {

        seo()->addSchema(
            Schema::website()
                ->name(config('website.name'))
                ->alternateName(config('website.alt_name'))
                ->url(url(''))
                ->publisher(
                    Schema::organization()
                        ->name('TJM Promos')
                        ->alternateName(['TJM Promos', 'TJM Promotions', 'TJM'])
                        ->description('Promotional Products with a No Worry Guarantee')
                        ->url('https://www.tjmpromos.com')
                        ->logo(Schema::ImageObject()->url('https://www.tjmpromos.com/images/theme/tjm-logo.png'))
                        ->email('info@tjmpromos.com')
                        ->faxNumber('+18668410416')
                        ->address(
                            Schema::postalAddress()
                                ->streetAddress('511 NW 48th Terrace')
                                ->addressLocality('Ocala')
                                ->addressRegion('FL')
                                ->postalCode('34482')
                                ->addressCountry('US')
                        )
                        ->contactPoint(
                            Schema::contactPoint()
                                ->telephone('+18004230449')
                                ->contactType('customer service')
                                ->email('info@tjmpromos.com')
                                ->availableLanguage('English')
                        )
                )
                ->mainEntity(
                    Schema::onlineStore()
                        ->name(config('website.name'))
                        ->description(config('website.description'))
                        ->url(url(''))
                        ->telephone(config('website.phone'))
                        ->email(config('website.email'))
                        ->contactPoint(
                            Schema::contactPoint()
                                ->telephone(config('website.phone'))
                                ->contactType('customer service')
                                ->email(config('website.email'))
                                ->availableLanguage('English')
                                ->hoursAvailable([
                                    Schema::openingHoursSpecification()
                                        ->dayOfWeek(DayOfWeek::Monday)
                                        ->opens((new DateTime('08:00:00', $this->timeZone))->format('H:i:sP'))
                                        ->closes((new DateTime('17:00:00', $this->timeZone))->format('H:i:sP')),
                                    Schema::openingHoursSpecification()
                                        ->dayOfWeek(DayOfWeek::Tuesday)
                                        ->opens((new DateTime('08:00:00', $this->timeZone))->format('H:i:sP'))
                                        ->closes((new DateTime('17:00:00', $this->timeZone))->format('H:i:sP')),
                                    Schema::openingHoursSpecification()
                                        ->dayOfWeek(DayOfWeek::Wednesday)
                                        ->opens((new DateTime('08:00:00', $this->timeZone))->format('H:i:sP'))
                                        ->closes((new DateTime('17:00:00', $this->timeZone))->format('H:i:sP')),
                                    Schema::openingHoursSpecification()
                                        ->dayOfWeek(DayOfWeek::Thursday)
                                        ->opens((new DateTime('08:00:00', $this->timeZone))->format('H:i:sP'))
                                        ->closes((new DateTime('17:00:00', $this->timeZone))->format('H:i:sP')),
                                    Schema::openingHoursSpecification()
                                        ->dayOfWeek(DayOfWeek::Friday)
                                        ->opens((new DateTime('08:00:00', $this->timeZone))->format('H:i:sP'))
                                        ->closes((new DateTime('17:00:00', $this->timeZone))->format('H:i:sP')),
                                ])
                        )
                    //                        ->potentialAction(
                    //                            Schema::quoteAction()
                    //                                ->target(route('quote')) // TODO: change this as needed
                    //                                ->inLanguage('en-US')
                    //                                ->actionPlatform(['http://schema.org/DesktopWebPlatform', 'http://schema.org/MobileWebPlatform'])
                    //                        )
                    //                        ->hasOfferCatalog(
                    //                            Schema::offerCatalog()
                    //                                ->name('Your Product Catalog Name')
                    //                                ->description('Your product catalog description')
                    //                                ->itemListElement([
                    //                                    Schema::product()
                    //                                        ->name('Product 1')
                    //                                        ->description('Product 1 description')
                    //                                        ->category('Your Product Category')
                    //                                        ->image([
                    //                                            'https://www.example.com/photos/1x1/product1.jpg',
                    //                                            'https://www.example.com/photos/4x3/product1.jpg',
                    //                                            'https://www.example.com/photos/16x9/product1.jpg',
                    //                                        ])
                    //                                        ->url('https://www.example.com/product1')
                    //                                        ->offers(
                    //                                            Schema::offer()
                    //                                                ->availability('https://schema.org/MadeToOrder')
                    //                                                ->keywords('keyword1, keyword2, keyword3')
                    //                                                ->itemCondition('https://schema.org/NewCondition')
                    //                                                ->priceSpecification(
                    //                                                    Schema::priceSpecification()
                    //                                                        ->price('0')
                    //                                                        ->priceCurrency('USD')
                    //                                                        ->description('Custom quote required')
                    //                                                )
                    //                                                ->deliveryTime(
                    //                                                    Schema::quantitativeValue()
                    //                                                        ->minValue(7)
                    //                                                        ->maxValue(14)
                    //                                                        ->unitCode('DAY')
                    //                                                )
                    //                                        ),
                    //                                    // Add more products as needed using the same structure
                    //                                ])
                    //                        ),
                ),
        );

    }
}
