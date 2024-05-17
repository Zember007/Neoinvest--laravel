<?php

namespace App\Http\Controllers;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\AbstractFont;
use Intervention\Image\Facades\Image;

class GenerateInstagramStory extends Controller
{
    public function __invoke(Request $request)
    {
        $story = Image::make(Storage::get('ig-template.jpg'));
        $this->insertProfilePicture($story);
        $this->insertHeader($story);
        $this->insertTurnover($story);
        $this->insertStar($story);
        $this->insertEarnedFromPartners($story);
        $this->insertDailyIncome($story);
        $this->insertReferralLink($story);

        return $story->response('jpg');
    }

    private function getPrimaryFont(): Closure
    {
        return function (AbstractFont $font) {
            $font->file(public_path('fonts/Inter-Bold.ttf'));
            $font->size(52);
        };
    }

    private function getSecondaryFont($size = 28): Closure
    {
        return function (AbstractFont $font) use ($size) {
            $font->file(public_path('fonts/Inter-Medium.ttf'));
            $font->size($size);
        };
    }

    private function getRegularFont(): Closure
    {
        return function (AbstractFont $font) {
            $font->file(public_path('fonts/Inter-Regular.ttf'));
            $font->size(24);
            $font->align('center');
        };
    }

    private function insertProfilePicture(\Intervention\Image\Image $story)
    {
        $profilePhotoUrl = auth()->user()->profile_photo_path
            ? public_path('storage/'.auth()->user()->profile_photo_path)
            : auth()->user()->profile_photo_url;
        $picture = Image::make(file_get_contents($profilePhotoUrl))
            ->resize(392, 392)
            ->mask(Image::make(Storage::get('ig-mask.png')), false);

        $story->insert($picture, 'top-left', 80, 151);
    }

    private function insertHeader(\Intervention\Image\Image $story)
    {
        $y = 306;
        $lines = explode("\n", wordwrap(auth()->user()->full_name, 25));
        foreach ($lines as $line) {
            $story->text($line, 518, $y, $this->getPrimaryFont());
            $y += 60;
        }

        $story->text(trans('general.my_account'), 520, $y + 3, $this->getSecondaryFont());
    }

    private function insertTurnover(\Intervention\Image\Image $story)
    {
        $turnOver = format_money(auth()->user()->getReferralsPacketInvests()).' USDT';

        $story->text($turnOver, 80, 1040, $this->getPrimaryFont());
        $story->text(trans('partners.turnover'), 80, 1100, $this->getSecondaryFont());

    }

    private function insertStar(\Intervention\Image\Image $story)
    {
        $star = auth()->user()->star->level;

        $story->text($star, 596, 1040, $this->getPrimaryFont());
        $story->text(trans('partners.star'), 596, 1100, $this->getSecondaryFont());
    }

    private function insertEarnedFromPartners(\Intervention\Image\Image $story)
    {
        $earned = format_money(auth()->user()->referral_bonuses).' USDT';

        $story->text($earned, 80, 1520, $this->getPrimaryFont());
        $story->text(trans('profile.earned_from_partners'), 80, 1580, $this->getSecondaryFont());
    }

    private function insertDailyIncome(\Intervention\Image\Image $story)
    {
        $income = format_money(auth()->user()->daily_income).' USDT / '.trans('general.day');

        $story->text($income, 596, 1520, $this->getPrimaryFont());
        $story->text(trans('general.total_capital_increase'), 596, 1580, $this->getSecondaryFont());
    }

    private function insertReferralLink(\Intervention\Image\Image $story)
    {
        $story->text(route('ref', auth()->id()), 440, 1765, $this->getSecondaryFont(36));
        $story->text(trans('profile.referral_link'), 566, 1824, $this->getRegularFont());
    }
}
