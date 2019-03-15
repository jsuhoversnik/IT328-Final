<?php
/**
 * Wu, Jake
 * 2/24/2019
 * 328/IT328-Final/classes/plan.php
 */

class plan
{
    private $_CPU;
    private $_Motherboard;
    private $_GPU;
    private $_RAM;
    private $_SSD;
    private $_HD;

    /**
     * plan constructor.
     * @param $_CPU
     * @param $_Motherboard
     * @param $_GPU
     * @param $_RAM
     * @param $_SSD
     * @param $_HD
     */
    public function __construct($_CPU, $_Motherboard, $_GPU, $_RAM, $_SSD, $_HD)
    {
        $this->_CPU = $_CPU;
        $this->_Motherboard = $_Motherboard;
        $this->_GPU = $_GPU;
        $this->_RAM = $_RAM;
        $this->_SSD = $_SSD;
        $this->_HD = $_HD;
    }

    /**
     * @return mixed
     */
    public function getCPU()
    {
        return $this->_CPU;
    }

    /**
     * @param mixed $CPU
     */
    public function setCPU($CPU)
    {
        $this->_CPU = $CPU;
    }

    /**
     * @return mixed
     */
    public function getMotherboard()
    {
        return $this->_Motherboard;
    }

    /**
     * @param mixed $Motherboard
     */
    public function setMotherboard($Motherboard)
    {
        $this->_Motherboard = $Motherboard;
    }

    /**
     * @return mixed
     */
    public function getGPU()
    {
        return $this->_GPU;
    }

    /**
     * @param mixed $GPU
     */
    public function setGPU($GPU)
    {
        $this->_GPU = $GPU;
    }

    /**
     * @return mixed
     */
    public function getRAM()
    {
        return $this->_RAM;
    }

    /**
     * @param mixed $RAM
     */
    public function setRAM($RAM)
    {
        $this->_RAM = $RAM;
    }

    /**
     * @return mixed
     */
    public function getSSD()
    {
        return $this->_SSD;
    }

    /**
     * @param mixed $SSD
     */
    public function setSSD($SSD)
    {
        $this->_SSD = $SSD;
    }

    /**
     * @return mixed
     */
    public function getHD()
    {
        return $this->_HD;
    }

    /**
     * @param mixed $HD
     */
    public function setHD($HD)
    {
        $this->_HD = $HD;
    }
}