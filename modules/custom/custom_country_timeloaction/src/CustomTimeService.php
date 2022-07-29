<?php
namespace Drupal\custom_country_timeloaction;
use Drupal\Core\Datetime\DateFormatter;
class CustomTimeService {
    /**
     * The date service.
     *
     * @var \Drupal\Core\Datetime\DateFormatter
     */
    protected $customdate;
    /**
     * Constructs a new object.
     * @param \Drupal\Core\Datetime\DateFormatter $Date
     */
    public function __construct(DateFormatter $Date) {
        $this->customdate = $Date;
    }
    /**
     * Get the date based on timezone.
     *
     */
    public function getCustomDate($timezone = null) {
        return $this->customdate->format(time(), 'custom', 'jS M Y - g:i A', $timezone, '');
    }
}
