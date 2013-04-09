<?php

/**
 * sfGuardUserTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class sfGuardUserTable extends PluginsfGuardUserTable
{
    /**
     * Returns an instance of this class.
     *
     * @return sfGuardUserTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('sfGuardUser');
    }
    
    /**
     * gets a sfGuardUser using the twiiter_username column of his Profile class
     *
     * @param String $twitterUsername
     * @param boolean $isActive
     * @return sfGuardUser
     */
    public function retrieveGuardUserByTwitterUsername($twitterUsername, $isActive = true)
    {
    	$q = $this->createQuery('u')
    	->innerJoin('u.Profile p')
    	->where('p.twitter_username = ?', $twitterUsername)
    	->andWhere('u.is_active = ?', $isActive);
    
    	if ($q->count())
    	{
    		return $q->fetchOne();
    	}
    
    	return null;
    }
    
    /**
     * gets or create a sfGuardUser using the twiiter_username column of his Profile class
     *
     * @param Integer $twiiterScreenName
     * @param boolean $isActive
     * @return sfGuardUser
     */
    public function getOrCreateGuardUserByTwitterUsername($twitterUsername, $isActive = true)
    {
    	$sfGuardUser = self::retrieveGuardUserByTwitterUsername($twitterUsername, $isActive);
    
    	if (!$sfGuardUser instanceof sfGuardUser)
    	{
    		$sfGuardUser = self::createGuardUserWithTwitterUsername($twitterUsername);    		
    	}
    
    	return $sfGuardUser;
    }
    
    /**
     * Creates an empty sfGuardUser with profile field twitter_username set
     *
     * @param Integer $facebook_uid
     * @return sfGuardUser
     * @author fabriceb
     * @since 2009-08-11
     */
    public function createGuardUserWithTwitterUsername($twitterUsername)
    {
    	$con = Doctrine::getConnectionByTableName('sfGuardUser');
    
    	$sfGuardUser = new sfGuardUser();
    	$sfGuardUser->setUsername($twitterUsername);
    	$sfGuardUser->Profile->setTwitterUsername($twitterUsername);
    
    	try
    	{
    		if (method_exists($con, 'begin'))
    		{
    			$con->begin();
    		}
    		else
    		{
    			$con->beginTransaction();
    		}
    		$sfGuardUser->save();
    		//$sfGuardUser->Profile->save();
    		$con->commit();
    	}
    	catch (Exiception $e)
    	{
    		$con->rollback();
    		throw $e;
    	}
    	return $sfGuardUser;
    }
    
    /**
     * gets a sfGuardUser using the email_address column of his Profile class
     *
     * @param String $emailAddress
     * @param boolean $isActive
     * @return sfGuardUser
     */
    public function retrieveGuardUserByEmailAddress($emailAddress, $isActive = true)
    {
    	$q = $this->createQuery('u')
    	->innerJoin('u.Profile p')
    	->where('p.email_address = ?', $emailAddress)
    	->andWhere('u.is_active = ?', $isActive);
    
    	if ($q->count())
    	{
    		return $q->fetchOne();
    	}
    
    	return null;
    }
    
    /**
     * Creates an empty sfGuardUser with profile field email_address set
     *
     * @param Integer $facebook_uid
     * @return sfGuardUser
     * @author fabriceb
     * @since 2009-08-11
     */
    public function createGuardUserWithEmailAddress($emailAddress)
    {
    	$con = Doctrine::getConnectionByTableName('sfGuardUser');
    
    	$sfGuardUser = new sfGuardUser();
    	$sfGuardUser->setUsername($emailAddress);
    	$sfGuardUser->setEmailAddress($emailAddress);
    	$sfGuardUser->Profile->setEmailAddress($emailAddress);
    
    	try
    	{
    		if (method_exists($con, 'begin'))
    		{
    			$con->begin();
    		}
    		else
    		{
    			$con->beginTransaction();
    		}
    		$sfGuardUser->save();
    		//$sfGuardUser->Profile->save();
    		$con->commit();
    	}
    	catch (Exiception $e)
    	{
    		$con->rollback();
    		throw $e;
    	}
    	return $sfGuardUser;
    }
    
    /**
     * gets or create a sfGuardUser using the email_address column of his Profile class
     *
     * @param Integer $emailAddress
     * @param boolean $isActive
     * @return sfGuardUser
     */
    public function getOrCreateGuardUserByEmailAddress($emailAddress, $isActive = true)
    {
    	$sfGuardUser = self::retrieveGuardUserByEmailAddress($emailAddress, $isActive);
    
    	if (!$sfGuardUser instanceof sfGuardUser)
    	{
    		$sfGuardUser = self::createGuardUserWithEmailAddress($emailAddress);
    	}
    
    	return $sfGuardUser;
    }
    
    public function getRankingUsersQuery($limit = false)
    {
    	$q = $this->createQuery('u');
    	$q->andWhere('u.is_super_admin = ?', false);
    	$q->leftJoin('u.Profile p');
    	$q->orderBy('p.points DESC, u.created_at ASC');
    	 
    	if($limit)
    	{
    		$q->limit($limit);
    	}
    	
    	return $q;
    }
    
    /**
     * @param unknown_type $limit
     * @return Doctrine_Collection
     */
    public function getRankingUsers($limit = false)
    {
    	$q = $this->getRankingUsersQuery($limit);
    	
    	return $q->execute();
    }
    
    /**
     * @param unknown_type $limit
     * @return Array
     */
    public function getTopRankingUsers($limit = false)
    {
    	$topUsers = $this->getRankingUsers($limit);
    	
    	return $topUsers;
    }   
    
    public function getUsersOrderByPositionQuery($limit = false)
    {
    	$q = $this->createQuery('u');
    	$q->leftJoin('u.Profile p');
	$q->andWhere('p.points > 0');
    	$q->orderBy('p.position ASC');
    
    	if($limit)
    	{
    		$q->limit($limit);
    	}
    	 
    	return $q;
    }
    
    /**
     * @param unknown_type $limit
     * @return Doctrine_Collection
     */
    public function getUsersOrderByPosition($limit = false)
    {
    	$q = $this->getUsersOrderByPositionQuery($limit);
    	 
    	return $q->execute();
    }
    
    public function getRankingUsersWithFilter($limit = false, $filter)
    {
    	$q = $this->getRankingUsersQuery($limit);
    	
    	if($filter == 'semanal')
    	{
    		//$oneWeekAgo = date('Y-m-d H:i:s', strtotime('1 week ago'));
    		//$q->leftJoin('u.Tweets t');
    		//$q->andWhere('t.created_at > ?', $oneWeekAgo);
    	}
    	
    	return $q->execute();
    }
    
    public function getUsersWithTwitterQuery($limit = false)
    {
    	$q = $this->createQuery('u');
    	$q->andWhere('u.is_super_admin = ?', false);
    	$q->leftJoin('u.Profile p');
    	$q->andWhere('p.twitter_username IS NOT NULL');
    	
    	if($limit)
    	{
    		$q->limit($limit);
    	}
    	 
    	return $q;
    }
    
    public function getUsersWithTwitter($limit = false)
    {
    	return $this->getUsersWithTwitterQuery($limit)->execute();
    }
    
    public function getUserOnPositionQuery($position)
    {
    	$q = $this->createQuery('u');
    	$q->leftJoin('u.Profile p');
    	$q->andWhere('p.position = ?', $position);    	 
    
    	return $q;
    }
    
    public function getUserOnPosition($position)
    {
    	return $this->getUserOnPositionQuery($position)->fetchOne();
    }
}