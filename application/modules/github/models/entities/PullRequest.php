<?php
class Github_Model_Entity_PullRequest extends Github_Model_Entity_Core {

    protected $_url;
    protected $_html_url;
    protected $_diff_url;
    protected $_patch_url;
    protected $_issue_url;
    protected $_number;
    protected $_state;
    protected $_title;
    protected $_body;
    protected $_created_at;
    protected $_updated_at;
    protected $_closed_at;
    protected $_merged_at;
    protected $_link_self_href;
    protected $_link_html_href;
    protected $_link_comments_href;
    protected $_link_review_comments_href;

    public function getUrl()
    {
        return $this->_url;
    }

    public function setUrl($url)
    {
        $this->_url = (string) $url;
        return $this;
    }

    public function getHtmlUrl()
    {
        return $this->_html_url;
    }

    public function setHtmlUrl($html_url)
    {
        $this->_html_url = (string) $html_url;
        return $this;
    }

    public function getDiffUrl()
    {
        return $this->_diff_url;
    }

    public function setDiffUrl($diff_url)
    {
        $this->_diff_url = (string) $diff_url;
        return $this;
    }

    public function getPatchUrl()
    {
        return $this->_patch_url;
    }

    public function setPatchUrl($patch_url)
    {
        $this->_patch_url = (string) $patch_url;
        return $this;
    }

    public function getIssueUrl()
    {
        return $this->_issue_url;
    }

    public function setIssueUrl($issue_url)
    {
        $this->_issue_url = (string) $issue_url;
        return $this;
    }

    public function getNumber()
    {
        return $this->_number;
    }

    public function setNumber($number)
    {
        $this->_number = (int) $number;
        return $this;
    }

    public function getState()
    {
        return $this->_state;
    }

    public function setState($state)
    {
        $this->_state = (string) $state;
        return $this;
    }

    public function getTitle()
    {
        return $this->_title;
    }

    public function setTitle($title)
    {
        $this->_title = (string) $title;
        return $this;
    }

    public function getBody()
    {
        return $this->_body;
    }

    public function setBody($body)
    {
        $this->_body = (string) $body;
        return $this;
    }

    public function getCreatedAt()
    {
        return $this->_created_at;
    }

    public function setCreatedAt($created_at)
    {
        $this->_created_at = (string) $created_at;
        return $this;
    }

    public function getUpdatedAt()
    {
        return $this->_updated_at;
    }

    public function setUpdatedAt($updated_at)
    {
        $this->_updated_at = (string) $updated_at;
        return $this;
    }

    public function getClosedAt()
    {
        return $this->_closed_at;
    }

    public function setClosedAt($closed_at)
    {
        $this->_closed_at = (string) $closed_at;
        return $this;
    }

    public function getMergedAt()
    {
        return $this->_merged_at;
    }

    public function setMergedAt($merged_at)
    {
        $this->_merged_at = (string) $merged_at;
        return $this;
    }

    public function getLinkSelfHref()
    {
        return $this->_link_self_href;
    }

    public function setLinkSelfHref($link_self_href)
    {
        $this->_link_self_href = (string) $link_self_href;
        return $this;
    }

    public function getLinkHtmlHref()
    {
        return $this->_link_html_href;
    }

    public function setLinkHtmlHref($link_html_href)
    {
        $this->_link_html_href = (string) $link_html_href;
        return $this;
    }

    public function getLinkCommentsHref()
    {
        return $this->_link_comments_href;
    }

    public function setLinkCommentsHref($link_comments_href)
    {
        $this->_link_comments_href = (string) $link_comments_href;
        return $this;
    }

    public function getLinkReviewCommentsHref()
    {
        return $this->_link_review_comments_href;
    }

    public function setLinkReviewCommentsHref($link_review_comments_href)
    {
        $this->_link_review_comments_href = (string) $link_review_comments_href;
        return $this;
    }
}