<?php

/**
 * This interface represents a Calendar that can be shared with other users.
 *
 * @package Sabre
 * @subpackage CalDAV
 * @copyright Copyright (C) 2007-2012 Rooftop Solutions. All rights reserved.
 * @author Evert Pot (http://www.rooftopsolutions.nl/)
 * @license http://code.google.com/p/sabredav/wiki/License Modified BSD License
 */
interface Sabre_CalDAV_IShareableCalendar extends Sabre_CalDAV_ICalendar {

    /**
     * Updates the list of shares.
     *
     * The first array is a list of people that are to be added to the
     * calendar.
     *
     * Every element in the add array has the following properties:
     *   * href - A url. Usually a mailto: address
     *   * commonName - Usually a first and last name, or false
     *   * summary - A description of the share, can also be false
     *   * readOnly - A boolean value
     *
     * Every element in the remove array is just the address string.
     *
     * Note that if the calendar is currently marked as 'not shared' by
     * getSharingEnabled, and this method is called; the calendar should be
     * 'upgraded' to a shared calendar.
     *
     * @param array $add
     * @param array $remove
     * @return void
     */
    function updateShares(array $add, array $remove);

    /**
     * Returns the list of people whom this calendar is shared with.
     *
     * Every element in this array should have the following properties:
     *   * href - Often a mailto: address
     *   * commonName - Optional, for example a first + last name
     *   * status - See the Sabre_CalDAV_SharingPlugin::STATUS_ constants.
     *   * readOnly - boolean
     *   * summary - Optional, a description for the share
     *
     * @return array
     */
    function getShares();

    /**
     * This method should return a simple true or false, if the calendar is
     * currently shared or not.
     *
     * Even if there are no 'sharees', the calendar may still be marked as
     * 'shared'. This is a silly implementation choice, but we need to comply
     * with the spec.
     *
     * @return bool
     */
    function getSharingEnabled();

    /**
     * This method marks the calendar as shared, or not.
     *
     * Note that if the calendar is currently shared by people, and false is
     * passed here, all the sharees should be removed.
     *
     * @param bool $value
     * @return void
     */
    function setSharingEnabled($value);

}
