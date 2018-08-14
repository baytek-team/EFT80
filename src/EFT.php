<?php
/**
 * Electronic Funds Transfer Class
 *
 * PHP version 7
 *
 * @category  Commerce
 * @package   EFT
 * @author    Yvon Viger <yvon@baytek.ca>
 * @copyright 1997-2018 Baytek
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 * @version   GIT: 1.0.0
 * @link      http://packages.baytek.ca/baytek/commerce/eft
 * @since     File available since Release 1.0.0
 */

namespace Baytek\Commerce\EFT;

use Iterator;

use Baytek\Commerce\EFT\Rows\Row;
use Baytek\Commerce\EFT\Rows\Header;
use Baytek\Commerce\EFT\Rows\Detail;
use Baytek\Commerce\EFT\Rows\Trailer;

/**
 * Electronic Funds Transfer Class
 */
class EFT implements Iterator
{
    /**
     * Array of rows
     *
     * @var array
     */
    protected $array = [];

    /**
     * Total of the detail rows
     *
     * @var float
     */
    protected $amount = 0;

    /**
     * Header row
     *
     * @var Baytek\Commerce\EFT\Row\Header
     */
    protected $header;

    /**
     * Trailer row
     *
     * @var Baytek\Commerce\EFT\Row\Trailer
     */
    protected $trailer;

    /**
     * Index of the iterator
     *
     * @var integer
     */
    private $_position = 0;
    
    /**
     * EFT Constructor
     *
     * @param mixed $fields Fields to populate for header
     * 
     * @return void
     */
    public function __construct()
    {
        $this->_position = 0;
    }

    /**
     * To string function simply returns the export
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->export();
    }

    /**
     * Set the header of the EFT
     *
     * @param Row $detail
     * 
     * @return void
     */
    public function setHeader(Header $header) //: void
    {
        $this->header = $header;
    }

    /**
     * Set the trailer of the EFT
     *
     * @param Trailer $trailer
     * 
     * @return void
     */
    public function setTrailer(Trailer $trailer) //: void
    {
        $this->trailer = $trailer;
    }

    /**
     * Create header record
     *
     * @param array $attributes
     * 
     * @return void
     */
    public function initialize(array $attributes) 
    {
        $this->header = new Header($attributes);
    }

    /**
     * Create header record
     *
     * @param array $attributes
     * 
     * @return void
     */
    public function finalize() 
    {
        $this->trailer = new Trailer([
            'recordType' => 'T',
            'transactions' => count($this->array),
            'amount' => $this->amount
        ]);
    }

    /**
     * Add a detail row, this will also sum up the details amount and count
     *
     * @param Detail $detail
     * 
     * @return void
     */
    public function addDetail(Detail $detail) //: void
    {
        $this->amount += $detail->amount;
        $this->addRow($detail);
    }

    /**
     * Add a row to the EFT
     *
     * @param Row $row
     * 
     * @return void
     */
    public function addRow(Row $row) //: void
    {
        array_push($this->array, $row);
    }

    /**
     * Export the reslt as eft file.
     *
     * @return string
     */
    public function export(): string
    {
        if (empty($this->header)) {
            throw new \Exception('Header is required');
        }

        if (empty($this->trailer)) {
            throw new \Exception('Trailer is required');
        }

        $buffer = '';
        $buffer .= $this->header->export()."\r\n";

        foreach ($this as $row) {
            $buffer .= $row->export()."\r\n";
        }

        $buffer .= $this->trailer->export()."\r\n";

        return $buffer;
    }

    /**
     * Rewind the iterator
     *
     * @return void
     */
    public function rewind() //: void
    {
        $this->_position = 0;
    }

    /**
     * Return the current index of the iterator
     *
     * @return mixed
     */
    public function current()
    {
        return $this->array[$this->_position];
    }

    /**
     * Get the current index
     *
     * @return int
     */
    public function key(): int
    {
        return $this->_position;
    }

    /**
     * Increment the index
     *
     * @return int
     */
    public function next()// : void
    {
        ++$this->_position;
    }

    /**
     * Is the currernt index valid
     *
     * @return bool
     */
    public function valid(): bool
    {
        return isset($this->array[$this->_position]);
    }
}


