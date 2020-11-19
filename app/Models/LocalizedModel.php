<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

/**
 * Class LocalizedModel
 * @package App\Models
 *
 * @property Model|null $localization
 * @property Collection|Model[] $localizations
 * @method static Builder|LocalizedModel withLocalization(string $locale)
 */
class LocalizedModel extends Model
{
    use HasFactory;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function localization()
    {
        return $this->hasOne(
            $this->getLocalizationModelName()
        );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function localizations()
    {
        return $this->hasMany(
            $this->getLocalizationModelName()
        );
    }

    /**
     * @param Builder $query
     * @param string $locale
     */
    public function scopeWithLocalization(Builder $query, string $locale): void
    {
        $filter = function ($query) use ($locale) {
            /** @var Builder $query */
            $query->where('lang', $locale);
        };

        $query
            ->whereHas('localization', $filter)
            ->with([
                'localization' => $filter
            ]);
    }

    /**
     * @return string
     */
    private function getLocalizationModelName(): string
    {
        return get_class($this) . 'Localization';
    }
}
