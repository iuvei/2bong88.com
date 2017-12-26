<?php

/**
 * This is the model class for table "tbl_betdata".
 *
 * The followings are the available columns in table 'tbl_betdata':
 * @property integer $Id
 * @property double $BPstake
 * @property string $BPBetKey
 * @property string $btnBPSubmit
 * @property string $HorseBPstake
 * @property string $HorseBPBetKey
 * @property string $stakeRequest
 * @property double $oddsRequest
 * @property string $oddChange1
 * @property string $oddChange2
 * @property double $MINBET
 * @property double $MAXBET
 * @property integer $bettype
 * @property string $lowerminmesg
 * @property string $highermaxmesg
 * @property string $areyousuremesg
 * @property string $areyousuremesg1
 * @property string $incorrectStakeMesg
 * @property string $oddsWarning
 * @property string $betconfirmmesg
 * @property integer $siteType
 * @property string $hidStake10
 * @property string $hidStake20
 * @property string $hidStake2
 * @property integer $sporttype
 * @property string $username
 * @property integer $oddsType
 * @property integer $cbAcceptBetterOdds
 * @property integer $matchid
 * @property string $lblBetKind
 * @property string $lblHome
 * @property string $lblAway
 * @property string $lblLeaguename
 * @property string $lbloddsStatus
 */
class betData extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public $totalBet;
	public function tableName()
	{
		return 'tbl_betdata';
	}
	
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('BPstake, BPBetKey, ipBet, btnBPSubmit, oddsRequest, oddChange1, oddChange2, MINBET, MAXBET, timeBet, bettype, lowerminmesg, highermaxmesg, areyousuremesg, areyousuremesg1, incorrectStakeMesg, oddsWarning, betconfirmmesg, hidStake10, hidStake20, hidStake2, sporttype, username, oddsType, cbAcceptBetterOdds, matchid, lblBetKind, lblHome, lblAway, lblLeaguename, lbloddsStatus', 'required'),
			array('bettype, siteType, sporttype, oddsType, cbAcceptBetterOdds, matchid, haveResult', 'numerical', 'integerOnly'=>true),
			array('oddsRequest, MINBET, MAXBET,winLost, processed, timeUpdate, com', 'numerical'),
			array('BPstake','numerical','min'=>0.1,'tooSmall'=>'Your stake too small'),
			array('BPBetKey,fullScore,haftScore', 'length', 'max'=>100),
			array("lblBetKind","checkBetType"),
			array('lblSportKind','checkTypeSport'),
			array('oddsType','checkOddsType'),
			array('btnBPSubmit', 'length', 'max'=>200),
			array('HorseBPstake, lblChoiceValue ,HorseBPBetKey, stakeRequest, oddChange1, lblBetKindValue, oddChange2, hidStake10, hidStake20, hidStake2, username, lblBetKind, lblHome, lblAway, lblLeaguename, lbloddsStatus,lblScoreValue, lblSportKind', 'length', 'max'=>300),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Id, BPstake, BPBetKey, btnBPSubmit, HorseBPstake, HorseBPBetKey, stakeRequest, oddsRequest, oddChange1, oddChange2, MINBET, MAXBET, bettype, lowerminmesg, highermaxmesg, areyousuremesg, areyousuremesg1, incorrectStakeMesg, oddsWarning, betconfirmmesg, siteType, hidStake10, hidStake20, hidStake2, sporttype, username, oddsType, cbAcceptBetterOdds, matchid, lblBetKind, lblHome, lblAway, lblLeaguename, lbloddsStatus, lblScoreValue, lblBetKindValue, lblSportKind', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}
	public function checkBetType()
	{
	
	
		$arrayType = array("Handicap","1H Handicap","Over/Under","1H Over/Under","FT.1X2","1H 1X2","Correct Score","Total Goal","1H Total Goal","Odd/Even","1H Odd/Even");
		if(!in_array($this->lblBetKind,$arrayType))
			$this->addError("lblBetKind","Please choice other bet kind, your bet kind you choice is in struction!!!");
	
	}
	public function checkOddsType()
	{
		if($this->oddsType!=4)
			$this->addError("oddsType","error odds type!");
	}
	public function checkTypeSport()
	{
	
		if($this->lblSportKind!="Soccer")
			$this->addError("Soccer","Please choice other sport kind, your bet sport you choice is in struction!!!");
	
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Id' => 'ID',
			'BPstake' => 'Tiền cược',
			'BPBetKey' => 'Bpbet Key',
			'btnBPSubmit' => 'Btn Bpsubmit',
			'HorseBPstake' => 'Horse Bpstake',
			'HorseBPBetKey' => 'Horse Bpbet Key',
			'stakeRequest' => 'Stake Request',
			'oddsRequest' => 'Odds Request',
			'oddChange1' => 'Odd Change1',
			'oddChange2' => 'Odd Change2',
			'MINBET' => 'Minbet',
			'MAXBET' => 'Maxbet',
			'bettype' => 'Bettype',
			'lowerminmesg' => 'Lowerminmesg',
			'highermaxmesg' => 'Highermaxmesg',
			'areyousuremesg' => 'Areyousuremesg',
			'areyousuremesg1' => 'Areyousuremesg1',
			'incorrectStakeMesg' => 'Incorrect Stake Mesg',
			'oddsWarning' => 'Odds Warning',
			'betconfirmmesg' => 'Betconfirmmesg',
			'siteType' => 'Site Type',
			'hidStake10' => 'Hid Stake10',
			'hidStake20' => 'Hid Stake20',
			'hidStake2' => 'Hid Stake2',
			'sporttype' => 'Sporttype',
			'username' => 'Username',
			'oddsType' => 'Odds Type',
			'cbAcceptBetterOdds' => 'Cb Accept Better Odds',
			'matchid' => 'Matchid',
			'lblBetKind' => 'Lbl Bet Kind',
			'lblHome' => 'Đội nhà',
			'lblAway' => 'Đội khách',
			'lblLeaguename' => 'Giải đấu',
			'lbloddsStatus' => 'Trạng thái',
			'timeBet' => 'Time bet',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('Id',$this->Id);
		$criteria->compare('BPstake',$this->BPstake);
		$criteria->compare('BPBetKey',$this->BPBetKey,true);
		$criteria->compare('btnBPSubmit',$this->btnBPSubmit,true);
		$criteria->compare('HorseBPstake',$this->HorseBPstake,true);
		$criteria->compare('HorseBPBetKey',$this->HorseBPBetKey,true);
		$criteria->compare('stakeRequest',$this->stakeRequest,true);
		$criteria->compare('oddsRequest',$this->oddsRequest);
		$criteria->compare('oddChange1',$this->oddChange1,true);
		$criteria->compare('oddChange2',$this->oddChange2,true);
		$criteria->compare('MINBET',$this->MINBET);
		$criteria->compare('MAXBET',$this->MAXBET);
		$criteria->compare('bettype',$this->bettype);
		$criteria->compare('lowerminmesg',$this->lowerminmesg,true);
		$criteria->compare('highermaxmesg',$this->highermaxmesg,true);
		$criteria->compare('areyousuremesg',$this->areyousuremesg,true);
		$criteria->compare('areyousuremesg1',$this->areyousuremesg1,true);
		$criteria->compare('incorrectStakeMesg',$this->incorrectStakeMesg,true);
		$criteria->compare('oddsWarning',$this->oddsWarning,true);
		$criteria->compare('betconfirmmesg',$this->betconfirmmesg,true);
		$criteria->compare('siteType',$this->siteType);
		$criteria->compare('hidStake10',$this->hidStake10,true);
		$criteria->compare('hidStake20',$this->hidStake20,true);
		$criteria->compare('hidStake2',$this->hidStake2,true);
		$criteria->compare('sporttype',$this->sporttype);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('oddsType',$this->oddsType);
		$criteria->compare('cbAcceptBetterOdds',$this->cbAcceptBetterOdds);
		$criteria->compare('matchid',$this->matchid);
		$criteria->compare('lblBetKind',$this->lblBetKind,true);
		$criteria->compare('lblHome',$this->lblHome,true);
		$criteria->compare('lblAway',$this->lblAway,true);
		$criteria->compare('lblLeaguename',$this->lblLeaguename,true);
		$criteria->compare('lbloddsStatus',$this->lbloddsStatus,true);
		$criteria->compare('winLost',$this->winLost,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return betData the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public function beforeSave()
	{
		$this->timeUpdate = time();
		return true;
	}
	
}
