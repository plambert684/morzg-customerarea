<?php
/*
 * @copyright 2021 Daniel Engelschalk <hello@mrkampf.com>
 */

namespace Proxmox\Api\Nodes\Node\Qemu\VmId\Agent;

use Proxmox\Helper\PVEPathClassBase;
use Proxmox\PVE;

/**
 * Class GetHostName
 * @package Proxmox\Api\Nodes\Node\Qemu\VmId\Agent
 */
class GetHostName extends PVEPathClassBase
{
    /**
     * Init constructor.
     * @param PVE $pve
     * @param string $parentAdditional
     */
    public function __construct(PVE $pve, string $parentAdditional)
    {
        parent::__construct($pve, $parentAdditional . 'get-host-name/');
    }

    /**
     * Execute get-host-name.
     * @link https://pve.proxmox.com/pve-docs/api-viewer/#/nodes/{node}/qemu/{vmid}/agent/get-host-name
     * @return array|null
     */
    public function get(): ?array
    {
        return $this->getPve()->getApi()->get($this->getPathAdditional());
    }
}