<?php

/**
 * Copyright 2020 (c) Chris Snedaker, All rights reserved.
 */

declare(strict_types=1);

namespace Cs\AbuseApi\Model\Source;

use Magento\Framework\Data\OptionSourceInterface;

/**
 * Class to get options of Categories that abusive IPs fall under
 *
 */
class ReportCategory implements OptionSourceInterface
{

    public $category =
        [
            1  => 'DNS Compromise',
            2  => 'DNS Poisoning',
            3  => 'Fraud Orders',
            4  => 'DDoS Attack',
            5  => 'FTP Brute-Force',
            6  => 'Ping of Death',
            7  => 'Phishing',
            8  => 'Fraud VoIP',
            9  => 'Open Proxy',
            10 => 'Web Spam',
            11 => 'Email Spam',
            12 => 'Blog Spam',
            13 => 'VPN IP',
            14 => 'Port Scan',
            15 => 'Hacking',
            16 => 'SQL Injection',
            17 => 'Spoofing',
            18 => 'Brute-Force',
            19 => 'Bad Web Bot',
            20 => 'Exploited Host',
            21 => 'Web App Attack',
            22 => 'SSH',
            23 => 'IoT Targeted'
        ];

    public $optionArray = [];

    public $description = [
        1  => 'Altering DNS records resulting in improper redirection.',
        2  => 'Falsifying domain server cache (cache poisoning).',
        3  => 'Fraudulent orders.',
        4  => 'Participating in distributed denial-of-service (usually part of botnet).',
        5  => '',
        6  => 'Oversized IP packet.',
        7  => 'Phishing websites and/or email.',
        8  => '',
        9  => 'Open proxy, open relay, or Tor exit node.',
        10 => 'Comment/forum spam, HTTP referer spam, or other CMS spam.',
        11 => 'Spam email content, infected attachments, and phishing emails. Note: Limit comments to only relevent information (instead of log dumps) and be sure to remove PII if you want to remain anonymous.',
        12 => 'CMS blog comment spam.',
        13 => 'Conjunctive category.',
        14 => 'Scanning for open ports and vulnerable services.',
        15 => '',
        16 => 'Attempts at SQL injection.',
        17 => 'Email sender spoofing.',
        18 => 'Credential brute-force attacks on webpage logins and services like SSH, FTP, SIP, SMTP, RDP, etc. This category is seperate from DDoS attacks.',
        19 => 'Webpage scraping (for email addresses, content, etc) and crawlers that do not honor robots.txt. Excessive requests and user agent spoofing can also be reported here.',
        20 => 'Host is likely infected with malware and being used for other attacks or to host malicious content. The host owner may not be aware of the compromise. This category is often used in combination with other attack categories.',
        21 => 'Attempts to probe for or exploit installed web applications such as a CMS like WordPress/Drupal, e-commerce solutions, forum software, phpMyAdmin and various other software plugins/solutions.',
        22 => 'Secure Shell (SSH) abuse. Use this category in combination with more specific categories.',
        23 => 'Abuse was targeted at an \'Internet of Things\' type device. Include information about what type of device was targeted in the comments.'
    ];

    /**
     * Return array of options as value-label pairs
     *
     * @return array Format: array(array('value' => '<value>', 'label' => '<label>'), ...)
     */
    public function toOptionArray($withFirstEmpty = true)
    {
        if (!empty($this->optionArray)) {
            return $this->optionArray;
        }
        if ($withFirstEmpty) {
            $this->optionArray[] = ['value' => 0, 'label' => '--- Select ---'];
        }
        foreach ($this->category as $value => $label) {
            $this->optionArray[] = ['value' => $value, 'label' => $label];
        }

        return $this->optionArray;
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        return $this->category;
    }

    /**
     * @param int $id
     *
     * @return string
     */
    public function getOptionText(int $id)
    {
        if (array_key_exists($id, $this->category)) {
            return $this->category[$id];
        }
        return false;
    }
}
