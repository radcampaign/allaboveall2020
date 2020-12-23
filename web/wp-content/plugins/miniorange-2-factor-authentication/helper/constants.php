<?php
	
	class MoWpnsConstants
	{
		const SUCCESS 					= "success";
		const FAILED 					= "failed";
		const PAST_FAILED 				= "pastfailed";
		const ACCESS_DENIED				= "accessDenied";
		const LOGIN_TRANSACTION 		= "User Login";
		const ERR_404					= "404";
		const ERR_403					= "403";
		const DEFAULT_CUSTOMER_KEY		= "16555";
		const DEFAULT_API_KEY 			= "fFd2XcvTGDemZvbw1bcUesNJWEqKbbUq";
		const DB_VERSION				= 153;
		const SUPPORT_EMAIL				= 'info@xecurify.com';
		const IP_LOOKUP_TEMPLATE		= '<span style="font-size:14px;font-weight:bold">GENERAL INFORMATION</span><table style="margin-left:2%;"><tr><td style="width:100px;">Response</td><td >:</td><td>{{status}}</td></tr><tr><td style="width:100px;">IP Address</td><td>:</td><td>{{ip}}</td></tr><tr><td>HostName</td><td>:</td><td>{{hostname}}</td></tr><tr><td>TimeZone</td><td>:</td><td>{{timezone}}</td></tr><tr><td>Time Difference</td><td>:</td><td>{{offset}}</td></tr></table><hr><span style="font-size:14px;font-weight:bold">LOCATION INFORMATION</span><table style="margin-left:2%;"><tr><td>Latitude</td><td>:</td><td>{{latitude}}</td></tr><tr><td>Longitude</td><td>:</td><td>{{longitude}}</td></tr><tr><td>Region</td><td>:</td><td>{{region}}</td></tr><tr><td>Country</td><td>:</td><td>{{country}}</td></tr><tr><td>City</td><td>:</td><td>{{city}}</td></tr><tr><td>Continent</td><td>:</td><td>{{continent}}</td></tr><tr><td>Curreny Code</td><td>:</td><td>{{curreny_code}}</td></tr><tr><td>Curreny Symbol</td><td>:</td><td>{{curreny_symbol}}</td></tr><tr><td>Per Dollar Value</td><td>:</td><td>{{per_dollar_value}}</td></tr></table>';
		const CURRENT_BROWSER			= '<span style="font-size:10px;color:red;">( Current Browser )</span>';
		
		//urls
		const RECAPTCHA_URL				= 'https://www.google.com/recaptcha/api.js';
		const HOST_NAME					= "https://login.xecurify.com";
		
		//plugins
		const TWO_FACTOR_SETTINGS		= 'miniorange-2-factor-authentication/miniorange_2_factor_settings.php';
		const OTP_VERIFICATION_SETTINGS = 'miniorange-otp-verification/miniorange_validation_settings.php';
		const SOCIAL_LOGIN_SETTINGS		= 'miniorange-login-openid/miniorange_openid_sso_settings.php';

		//arrays
		public static $domains			= array('0-mail.com','20email.eu','0815.ru','0815.su','0clickemail.com','0sg.net','0wnd.net','0wnd.org','10mail.org','10minutemail.cf','10minutemail.com','10minutemail.de','10minutemail.ga','10minutemail.gq','10minutemail.ml','123-m.com','12hourmail.com','12minutemail.com','1ce.us','1chuan.com','1mail.ml','1pad.de','1zhuan.com','20mail.in','20mail.it','20minutemail.com','21cn.com','24hourmail.com','2prong.com','30minutemail.com','30minutesmail.com','3126.com','33mail.com','3d-painting.com','3mail.ga','4mail.cf','4mail.ga','4warding.com','4warding.net','4warding.org','50e.info','5mail.cf','5mail.ga','60minutemail.com','675hosting.com','675hosting.net','675hosting.org','6ip.us','6mail.cf','6mail.ga','6mail.ml','6paq.com','6url.com','75hosting.com','75hosting.net','75hosting.org','7days-printing.com','7mail.ga','7mail.ml','7tags.com','8mail.cf','8mail.ga','8mail.ml','99experts.com','9mail.cf','9ox.net','BeefMilk.com','DingBone.com','FudgeRub.com','LookUgly.com','MailScrap.com','SmellFear.com','TempEmail.net','a-bc.net','a45.in','abcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzabcdefghijk.com','abusemail.de','abwesend.de','abyssmail.com','ac20mail.in','acentri.com','addcom.de','advantimo.com','afrobacon.com','ag.us.to','agedmail.com','agnitumhost.net','ahk.jp','ajaxapp.net','alivance.com','alpenjodel.de','alphafrau.de','amail.com','amilegit.com','amiri.net','amiriindustries.com','amorki.pl','anappthat.com','ano-mail.net','anonbox.net','anonymail.dk','anonymbox.com','antichef.com','antichef.net','antispam.de','antispam24.de','appixie.com','armyspy.com','asdasd.nl','autosfromus.com','aver.com','azmeil.tk','baldmama.de','baldpapa.de','ballyfinance.com','baxomale.ht.cx','beddly.com','beefmilk.com','betriebsdirektor.de','big1.us','bigmir.net','bigprofessor.so','bigstring.com','bin-wieder-da.de','binkmail.com','bio-muesli.info','bio-muesli.net','bladesmail.net','bleib-bei-mir.de','blockfilter.com','blogmyway.org','bluebottle.com','bobmail.info','bodhi.lawlita.com','bofthew.com','bonbon.net','bootybay.de','boun.cr','bouncr.com','boxformail.in','boxtemp.com.br','brefmail.com','brennendesreich.de','briefemail.com','broadbandninja.com','brokenvalve.com','brokenvalve.org','bsnow.net','bspamfree.org','bu.mintemail.com','buerotiger.de','buffemail.com','bugmenot.com','bumpymail.com','bund.us','bundes-li.ga','burnthespam.info','burstmail.info','buy-24h.net.ru','buyusedlibrarybooks.org','c2.hu','cachedot.net','cashette.com','casualdx.com','cbair.com','ce.mintemail.com','cellurl.com','center-mail.de','centermail.at','centermail.ch','centermail.com','centermail.de','centermail.info','centermail.net','cghost.s-a-d.de','chammy.info','cheatmail.de','chogmail.com','choicemail1.com','chong-mail.com','chong-mail.net','chong-mail.org','chongsoft.org','clixser.com','cmail.com','cmail.net','cmail.org','coldemail.info','consumerriot.com','cool.fr.nf','coole-files.de','correo.blogos.net','cosmorph.com','courriel.fr.nf','courrieltemporaire.com','crapmail.org','crazespaces.pw','crazymailing.com','cubiclink.com','curryworld.de','cust.in','cuvox.de','cyber-matrix.com','dacoolest.com','daintly.com','dandikmail.com','dating4best.net','dayrep.com','dbunker.com','dcemail.com','deadaddress.com','deadchildren.org','deadfake.cf','deadfake.ga','deadfake.ml','deadfake.tk','deadspam.com','deagot.com','dealja.com','despam.it','despammed.com','devnullmail.com','dfgh.net','dharmatel.net','die-besten-bilder.de','die-genossen.de','die-optimisten.de','die-optimisten.net','dieMailbox.de','digital-filestore.de','digitalsanctuary.com','dingbone.com','directbox.com','discard.cf','discard.email','discard.ga','discard.gq','discard.ml','discard.tk','discardmail.*','discardmail.com','discardmail.de','discartmail.com','disposable-email.ml','disposable.cf','disposable.ga','disposable.ml','disposableaddress.com','disposableemailaddresses.com','disposableemailaddresses.emailmiser.com','disposableinbox.com','dispose.it','disposeamail.com','disposemail.com','dispostable.com','divermail.com','dm.w3internet.co.uk','example.com','docmail.cz','dodgeit.com','dodgit.com','dodgit.org','dogit.com','doiea.com','domozmail.com','donemail.ru','dontreg.com','dontsendmespam.de','dontsentmespam.de','dotmsg.com','download-privat.de','drdrb.com','drdrb.net','droplar.com','dropmail.me','duam.net','dudmail.com','dump-email.info','dumpandjunk.com','dumpmail.com','dumpmail.de','dumpyemail.com','duskmail.com','dyndns.org','e-mail.com','e-mail.org','e4ward.com','easytrashmail.com','ee2.pl','eelmail.com','einrot.com','einrot.de','eintagsmail.de','email-fake.cf','email-fake.ga','email-fake.gq','email-fake.ml','email-fake.tk','email.org','email4u.info','email60.com','emailage.cf','emailage.ga','emailage.gq','emailage.ml','emailage.tk','emaildienst.de','emailgo.de','emailias.com','emailigo.de','emailinfive.com','emailisvalid.com','emaillime.com','emailmiser.com','emailproxsy.com','emails.ga','emailsensei.com','emailspam.cf','emailspam.ga','emailspam.gq','emailspam.ml','emailspam.tk','emailtaxi.de','emailtemporanea.net','emailtemporar.ro','emailtemporario.com.br','emailthe.net','emailtmp.com','emailto.de','emailwarden.com','emailx.at.hm','emailxfer.com','emailz.cf','emailz.ga','emailz.gq','emailz.ml','emeil.in','emeil.ir','emil.com','emkei.cf','emkei.ga','emkei.gq','emkei.ml','emkei.tk','emz.net','enterto.com','ephemail.net','etranquil.com','etranquil.net','etranquil.org','evopo.com','example.com','explodemail.com','eyepaste.com','facebook-email.cf','facebook-email.ga','facebook-email.ml','facebookmail.gq','facebookmail.ml','fahr-zur-hoelle.org','fake-mail.cf','fake-mail.ga','fake-mail.ml','fakeinbox.cf','fakeinbox.com','fakeinbox.ga','fakeinbox.ml','fakeinbox.tk','fakeinformation.com','fakemail.fr','fakemailgenerator.com','fakemailz.com','falseaddress.com','fammix.com','fansworldwide.de','fantasymail.de','farifluset.mailexpire.com','fastacura.com','fastchevy.com','fastchrysler.com','fastkawasaki.com','fastmazda.com','fastmitsubishi.com','fastnissan.com','fastsubaru.com','fastsuzuki.com','fasttoyota.com','fastyamaha.com','fatflap.com','fdfdsfds.com','feinripptraeger.de','fettabernett.de','fightallspam.com','fiifke.de','filzmail.com','fishfuse.com','fixmail.tk','fizmail.com','fleckens.hu','flurred.com','flyspam.com','footard.com','forgetmail.com','fornow.eu','fr33mail.info','frapmail.com','free-email.cf','free-email.ga','freemail.ms','freemails.cf','freemails.ga','freemails.ml','freemeilaadressforall.net','freudenkinder.de','freundin.ru','friendlymail.co.uk','fromru.com','front14.org','fuckingduh.com','fudgerub.com','fux0ringduh.com','garliclife.com','gawab.com','gelitik.in','gentlemansclub.de','get-mail.cf','get-mail.ga','get-mail.ml','get-mail.tk','get1mail.com','get2mail.fr','getairmail.cf','getairmail.com','getairmail.ga','getairmail.gq','getairmail.ml','getairmail.tk','getmails.eu','getonemail.com','getonemail.net','ghosttexter.de','girlsundertheinfluence.com','gishpuppy.com','goemailgo.com','gold-profits.info','goldtoolbox.com','golfilla.info','gorillaswithdirtyarmpits.com','gotmail.com','gotmail.net','gotmail.org','gotti.otherinbox.com','gowikibooks.com','gowikicampus.com','gowikicars.com','gowikifilms.com','gowikigames.com','gowikimusic.com','gowikinetwork.com','gowikitravel.com','gowikitv.com','grandmamail.com','grandmasmail.com','great-host.in','greensloth.com','grr.la','gsrv.co.uk','guerillamail.biz','guerillamail.com','guerillamail.net','guerillamail.org','guerrillamail.biz','guerrillamail.com','guerrillamail.de','guerrillamail.info','guerrillamail.net','guerrillamail.org','guerrillamailblock.com','gustr.com','h.mintemail.com','h8s.org','hab-verschlafen.de','habmalnefrage.de','hacccc.com','haltospam.com','harakirimail.com','hartbot.de','hatespam.org','hellodream.mobi','herp.in','herr-der-mails.de','hidemail.de','hidzz.com','hmamail.com','hochsitze.com','home.de','hopemail.biz','hot-mail.cf','hot-mail.ga','hot-mail.gq','hot-mail.ml','hot-mail.tk','hotpop.com','hulapla.de','humn.ws.gy','hush.com','hushmail.com','ich-bin-verrueckt-nach-dir.de','ich-will-net.de','ieatspam.eu','ieatspam.info','ieh-mail.de','ihateyoualot.info','iheartspam.org','ikbenspamvrij.nl','imails.info','imgof.com','imstations.com','inbax.tk','inbox.si','inbox2.info','inboxalias.com','inboxclean.com','inboxclean.org','inboxproxy.com','incognitomail.com','incognitomail.net','incognitomail.org','inerted.com','inmail24.com','insorg-mail.info','instant-mail.de','instantemailaddress.com','ipoo.org','irish2me.com','iroid.com','ist-allein.info','ist-einmalig.de','ist-ganz-allein.de','ist-willig.de','iwi.net','izmail.net','jetable.com','jetable.de','jetable.fr.nf','jetable.net','jetable.org','jetfix.ee','jetzt-bin-ich-dran.com','jn-club.de','jnxjn.com','jobbikszimpatizans.hu','jourrapide.com','jsrsolutions.com','junk1e.com','junkmail.com','junkmail.ga','junkmail.gq','kaffeeschluerfer.com','kaffeeschluerfer.de','kasmail.com','kaspop.com','keepmymail.com','killmail.com','killmail.net','kimsdisk.com','kinglibrary.net','kingsq.ga','kir.ch.tc','klassmaster.com','klassmaster.net','klzlk.com','kommespaeter.de','kook.ml','koszmail.pl','krim.ws','kuh.mu','kulturbetrieb.info','kurzepost.de','l33r.eu','labetteraverouge.at','lackmail.net','lags.us','landmail.co','lass-es-geschehen.de','lastmail.co','lastmail.com','lazyinbox.com','letthemeatspam.com','lhsdv.com','liebt-dich.info','lifebyfood.com','link2mail.net','listomail.com','litedrop.com','loadby.us','login-email.cf','login-email.ga','login-email.ml','login-email.tk','lol.ovpn.to','lookugly.com','lopl.co.cc','lortemail.dk','lovemeleaveme.com','loveyouforever.de','lr7.us','lr78.com','lroid.com','luv2.us','m4ilweb.info','maboard.com','maennerversteherin.com','maennerversteherin.de','mail-filter.com','mail-temporaire.fr','mail.by','mail.htl22.at','mail.mezimages.net','mail.misterpinball.de','mail.svenz.eu','mail114.net','mail15.com','mail2rss.org','mail333.com','mail4days.com','mail4trash.com','mail4u.info','mailbidon.com','mailblocks.com','mailbucket.org','mailcat.biz','mailcatch.*','mailcatch.com','maildrop.cc','maildrop.cf','maildrop.ga','maildrop.gq','maildrop.ml','maildx.com','maileater.com','mailexpire.com','mailfa.tk','mailforspam.com','mailfree.ga','mailfree.gq','mailfree.ml','mailfreeonline.com','mailfs.com','mailguard.me','mailimate.com','mailin8r.com','mailinater.com','mailinator.com','mailinator.gq','mailinator.net','mailinator.org','mailinator.us','mailinator2.com','mailinblack.com','mailincubator.com','mailismagic.com','mailjunk.cf','mailjunk.ga','mailjunk.gq','mailjunk.ml','mailjunk.tk','mailmate.com','mailme.gq','mailme.ir','mailme.lv','mailme24.com','mailmetrash.com','mailmoat.com','mailnator.com','mailnesia.com','mailnull.com','mailpick.biz','mailproxsy.com','mailquack.com','mailrock.biz','mailsac.com','mailscrap.com','mailseal.de','mailshell.com','mailsiphon.com','mailslapping.com','mailslite.com','mailtemp.info','mailtothis.com','mailtrash.net','mailueberfall.de','mailzilla.com','mailzilla.org','mailzilla.orgmbx.cc','makemetheking.com','mamber.net','manifestgenerator.com','manybrain.com','mbx.cc','mciek.com','mega.zik.dj','meine-dateien.info','meine-diashow.de','meine-fotos.info','meine-urlaubsfotos.de','meinspamschutz.de','meltmail.com','messagebeamer.de','metaping.com','mezimages.net','mfsa.ru','mierdamail.com','migumail.com','mintemail.com','mjukglass.nu','mns.ru','moakt.com','mobi.web.id','mobileninja.co.uk','moburl.com','mohmal.com','moncourrier.fr.nf','monemail.fr.nf','monmail.fr.nf','monumentmail.com','ms9.mailslite.com','msa.minsmail.com','msh.mailslite.com','mt2009.com','mt2014.com','mufmail.com','muskelshirt.de','mx0.wwwnew.eu','my-mail.ch','my10minutemail.com','myadult.info','mycleaninbox.net','myemailboxy.com','mymail-in.net','mymailoasis.com','mynetstore.de','mypacks.net','mypartyclip.de','myphantomemail.com','myspaceinc.com','myspaceinc.net','myspaceinc.org','myspacepimpedup.com','myspamless.com','mytemp.email','mytempemail.com','mytop-in.net','mytrashmail.com','mytrashmail.compookmail.com','neomailbox.com','nepwk.com','nervmich.net','nervtmich.net','netmails.com','netmails.net','netterchef.de','netzidiot.de','neue-dateien.de','neverbox.com','nice-4u.com','nmail.cf','no-spam.ws','nobulk.com','noclickemail.com','nogmailspam.info','nomail.xl.cx','nomail2me.com','nomorespamemails.com','nonspam.eu','nonspammer.de','noref.in','nospam.wins.com.br','nospam.ze.tc','nospam4.us','nospamfor.us','nospammail.net','nospamthanks.info','notmailinator.com','notsharingmy.info','nowhere.org','nowmymail.com','ntlhelp.net','nullbox.info','nur-fuer-spam.de','nurfuerspam.de','nus.edu.sg','nwldx.com','nybella.com','objectmail.com','obobbo.com','odaymail.com','office-dateien.de','oikrach.com','one-time.email','oneoffemail.com','oneoffmail.com','onewaymail.com','online.ms','oopi.org','opayq.com','orangatango.com','ordinaryamerican.net','otherinbox.com','ourklips.com','outlawspam.com','ovpn.to','owlpic.com','pancakemail.com','paplease.com','partybombe.de','partyheld.de','pcusers.otherinbox.com','pepbot.com','pfui.ru','phreaker.net','pimpedupmyspace.com','pisem.net','pjjkp.com','pleasedontsendmespam.de','plexolan.de','poczta.onet.pl','politikerclub.de','polizisten-duzer.de','poofy.org','pookmail.com','pornobilder-mal-gratis.com','portsaid.cc','postacin.com','postfach.cc','privacy.net','privy-mail.com','privymail.de','proxymail.eu','prtnx.com','prtz.eu','prydirect.info','pryworld.info','public-files.de','punkass.com','put2.net','putthisinyourspamdatabase.com','pwrby.com','qasti.com','qisdo.com','qisoa.com','qq.com','quantentunnel.de','quickinbox.com','quickmail.nl','qv7.info','radiku.ye.vc','ralib.com','raubtierbaendiger.de','rcpt.at','reallymymail.com','receiveee.chickenkiller.com','receiveee.com','recode.me','reconmail.com','record.me','recursor.net','recyclemail.dk','regbypass.com','regbypass.comsafe-mail.net','rejectmail.com','remail.cf','remail.ga','rhyta.com','rk9.chickenkiller.com','rklips.com','rmqkr.net','rootprompt.org','royal.net','rppkn.com','rtrtr.com','ruffrey.com','s0ny.net','saeuferleber.de','safe-mail.net','safersignup.de','safetymail.info','safetypost.de','sags-per-mail.de','sandelf.de','satka.net','saynotospams.com','scatmail.com','schafmail.de','schmusemail.de','schreib-doch-mal-wieder.de','selfdestructingmail.com','selfdestructingmail.org','sendspamhere.com','senseless-entertainment.com','shared-files.de','sharedmailbox.org','sharklasers.com','shieldedmail.com','shiftmail.com','shinedyoureyes.com','shitmail.me','shitmail.org','shitware.nl','shortmail.net','showslow.de','sibmail.com','sinnlos-mail.de','siria.cc','siteposter.net','skeefmail.com','skeefmail.net','slaskpost.se','slave-auctions.net','slopsbox.com','slushmail.com','smashmail.de','smellfear.com','smellrear.com','sms.at','snakemail.com','sneakemail.com','snkmail.com','sofimail.com','sofort-mail.de','sofortmail.de','softpls.asia','sogetthis.com','sohu.com','soisz.com','solvemail.info','sonnenkinder.org','soodomail.com','soodonims.com','spam-be-gone.com','spam.la','spam.su','spam4.me','spamavert.com','spambob.com','spambob.net','spambob.org','spambog.*','spambog.com','spambog.de','spambog.net','spambog.ru','spambooger.com','spambox.info','spambox.irishspringrealty.com','spambox.us','spamcannon.com','spamcannon.net','spamcero.com','spamcon.org','spamcorptastic.com','spamcowboy.com','spamcowboy.net','spamcowboy.org','spamday.com','spamdecoy.net','spameater.com','spameater.org','spamex.com','spamfighter.cf','spamfighter.ga','spamfighter.gq','spamfighter.ml','spamfighter.tk','spamfree.eu','spamfree24.com','spamfree24.de','spamfree24.eu','spamfree24.info','spamfree24.net','spamfree24.org','spamgoes.in','spamgourmet.com','spamgourmet.net','spamgourmet.org','spamgrube.net','spamherelots.com','spamhereplease.com','spamhole.com','spamify.com','spaminator.de','spamkill.info','spaml.com','spaml.de','spammote.com','spammotel.com','spammuffel.de','spamobox.com','spamoff.de','spamreturn.com','spamsalad.in','spamslicer.com','spamspot.com','spamstack.net','spamthis.co.uk','spamthisplease.com','spamtrail.com','spamtroll.net','speed.1s.fr','sperke.net','spikio.com','spoofmail.de','squizzy.de','sriaus.com','ssoia.com','startkeys.com','stinkefinger.net','stop-my-spam.cf','stop-my-spam.com','stop-my-spam.ga','stop-my-spam.ml','stop-my-spam.tk','streber24.de','streetwisemail.com','stuffmail.de','super-auswahl.de','supergreatmail.com','supermailer.jp','superrito.com','superstachel.de','suremail.info','svk.jp','sweetville.net','sweetxxx.de','tafmail.com','tagesmail.eu','tagyourself.com','talkinator.com','tapchicuoihoi.com','teewars.org','teleworm.com','teleworm.us','temp-mail.com','temp-mail.org','temp.emeraldwebmail.com','temp.headstrong.de','tempail.com','tempalias.com','tempe-mail.com','tempemail.biz','tempemail.co.za','tempemail.com','tempemail.net','tempinbox.co.uk','tempinbox.com','tempmail.it','tempmail2.com','tempmaildemo.com','tempmailer.com','tempomail.fr','temporarily.de','temporarioemail.com.br','temporaryemail.net','temporaryemail.us','temporaryforwarding.com','temporaryinbox.com','tempsky.com','tempthe.net','tempymail.com','terminverpennt.de','test.com','test.de','thanksnospam.info','thankyou2010.com','thecloudindex.com','thepryam.info','thisisnotmyrealemail.com','throam.com','throwawayemailaddress.com','throwawaymail.com','tilien.com','tittbit.in','tmail.ws','tmailinator.com','toiea.com','toomail.biz','topmail-files.de','tortenboxer.de','totalmail.de','tradermail.info','trash-amil.com','trash-mail.at','trash-mail.cf','trash-mail.com','trash-mail.de','trash-mail.ga','trash-mail.gq','trash-mail.ml','trash-mail.tk','trash2009.com','trash2010.com','trash2011.com','trashbox.eu','trashdevil.com','trashdevil.de','trashemail.de','trashmail.at','trashmail.com','trashmail.de','trashmail.me','trashmail.net','trashmail.org','trashmail.ws','trashmailer.com','trashymail.com','trashymail.net','trayna.com','trbvm.com','trickmail.net','trillianpro.com','trimix.cn','tryalert.com','turboprinz.de','turboprinzessin.de','turual.com','twinmail.de','twoweirdtricks.com','tyldd.com','ubismail.net','uggsrock.com','uk2.net','ukr.net','umail.net','unmail.ru','unterderbruecke.de','upliftnow.com','uplipht.com','uroid.com','username.e4ward.com','valemail.net','venompen.com','verlass-mich-nicht.de','veryrealemail.com','vidchart.com','viditag.com','viewcastmedia.com','viewcastmedia.net','viewcastmedia.org','vinbazar.com','vollbio.de','volloeko.de','vomoto.com','vorsicht-bissig.de','vorsicht-scharf.de','vubby.com','walala.org','walkmail.net','war-im-urlaub.de','wbb3.de','webemail.me','webm4il.info','webmail4u.eu','webuser.in','wee.my','weg-werf-email.de','wegwerf-email-addressen.de','wegwerf-emails.de','wegwerfadresse.de','wegwerfemail.com','wegwerfemail.de','wegwerfmail.de','wegwerfmail.info','wegwerfmail.net','wegwerfmail.org','wegwerpmailadres.nl','weibsvolk.de','weibsvolk.org','weinenvorglueck.de','wetrainbayarea.com','wetrainbayarea.org','wh4f.org','whatiaas.com','whatpaas.com','whatsaas.com','whopy.com','whtjddn.33mail.com','whyspam.me','wickmail.net','wilemail.com','will-hier-weg.de','willhackforfood.biz','willselfdestruct.com','winemaven.info','wir-haben-nachwuchs.de','wir-sind-cool.org','wirsindcool.de','wmail.cf','wolke7.net','wollan.info','women-at-work.org','wormseo.cn','wronghead.com','wuzup.net','wuzupmail.net','www.e4ward.com','www.gishpuppy.com','www.mailinator.com','wwwnew.eu','xagloo.com','xemaps.com','xents.com','xmail.com','xmaily.com','xoxox.cc','xoxy.net','xsecurity.org','xyzfree.net','yapped.net','yeah.net','yep.it','yert.ye.vc','yesey.net','yogamaven.com','yomail.info','yopmail.com','yopmail.fr','yopmail.gq','yopmail.net','yopweb.com','youmail.ga','youmailr.com','ypmail.webarnak.fr.eu.org','ystea.org','yuurok.com','yzbid.com','za.com','zehnminutenmail.de','zetmail.com','zippymail.info','zoaxe.com','zoemail.com','zoemail.net','zoemail.org','zomg.info','zweb.in','zxcv.com','zxcvbnm.com','zzz.com');
		public static $country 			= array('A1' =>'ANONYMOUS PROXY','A2' =>'SATELLITE PROVIDER','O1' =>'OTHER COUNTRY','AF' => 'AFGHANISTAN','AL' => 'ALBANIA','DZ' => 'ALGERIA','AS' => 'AMERICAN SAMOA','AD' => 'ANDORRA','AO' => 'ANGOLA','AI' => 'ANGUILLA','AQ' => 'ANTARCTICA','AG' => 'ANTIGUA AND BARBUDA','AR' => 'ARGENTINA','AM' => 'ARMENIA','AW' => 'ARUBA','AU' => 'AUSTRALIA','AT' => 'AUSTRIA','AZ' => 'AZERBAIJAN','BS' => 'BAHAMAS','BH' => 'BAHRAIN','BD' => 'BANGLADESH','BB' => 'BARBADOS','BY' => 'BELARUS','BE' => 'BELGIUM','BZ' => 'BELIZE','BJ' => 'BENIN','BM' => 'BERMUDA','BT' => 'BHUTAN','BO' => 'BOLIVIA','BA' => 'BOSNIA AND HERZEGOVINA','BW' => 'BOTSWANA','BV' => 'BOUVET ISLAND','BR' => 'BRAZIL','IO' => 'BRITISH INDIAN OCEAN TERRITORY','BN' => 'BRUNEI DARUSSALAM','BG' => 'BULGARIA','BF' => 'BURKINA FASO','BI' => 'BURUNDI','KH' => 'CAMBODIA','CM' => 'CAMEROON','CA' => 'CANADA','CV' => 'CAPE VERDE','KY' => 'CAYMAN ISLANDS','CF' => 'CENTRAL AFRICAN REPUBLIC','TD' => 'CHAD','CL' => 'CHILE','CN' => 'CHINA','CX' => 'CHRISTMAS ISLAND','CC' => 'COCOS (KEELING) ISLANDS','CO' => 'COLOMBIA','KM' => 'COMOROS','CG' => 'CONGO','CD' => 'CONGO, THE DEMOCRATIC REPUBLIC OF THE','CK' => 'COOK ISLANDS','CR' => 'COSTA RICA','CI' => 'COTE D IVOIRE','HR' => 'CROATIA','CU' => 'CUBA','CY' => 'CYPRUS','CZ' => 'CZECH REPUBLIC','DK' => 'DENMARK','DJ' => 'DJIBOUTI','DM' => 'DOMINICA','DO' => 'DOMINICAN REPUBLIC','TP' => 'EAST TIMOR','EC' => 'ECUADOR','EG' => 'EGYPT','SV' => 'EL SALVADOR','GQ' => 'EQUATORIAL GUINEA','ER' => 'ERITREA','EE' => 'ESTONIA','ET' => 'ETHIOPIA','FK' => 'FALKLAND ISLANDS (MALVINAS)','FO' => 'FAROE ISLANDS','FJ' => 'FIJI','FI' => 'FINLAND','FR' => 'FRANCE','GF' => 'FRENCH GUIANA','PF' => 'FRENCH POLYNESIA','TF' => 'FRENCH SOUTHERN TERRITORIES','GA' => 'GABON','GM' => 'GAMBIA','GE' => 'GEORGIA','DE' => 'GERMANY','GH' => 'GHANA','GI' => 'GIBRALTAR','GR' => 'GREECE','GL' => 'GREENLAND','GD' => 'GRENADA','GP' => 'GUADELOUPE','GU' => 'GUAM','GT' => 'GUATEMALA','GN' => 'GUINEA','GW' => 'GUINEA-BISSAU','GY' => 'GUYANA','HT' => 'HAITI','HM' => 'HEARD ISLAND AND MCDONALD ISLANDS','VA' => 'HOLY SEE (VATICAN CITY STATE)','HN' => 'HONDURAS','HK' => 'HONG KONG','HU' => 'HUNGARY','IS' => 'ICELAND','IN' => 'INDIA','ID' => 'INDONESIA','IR' => 'IRAN, ISLAMIC REPUBLIC OF','IQ' => 'IRAQ','IE' => 'IRELAND','IL' => 'ISRAEL','IT' => 'ITALY','JM' => 'JAMAICA','JP' => 'JAPAN','JO' => 'JORDAN','KZ' => 'KAZAKSTAN','KE' => 'KENYA','KI' => 'KIRIBATI','KP' => 'KOREA DEMOCRATIC PEOPLES REPUBLIC OF','KR' => 'KOREA REPUBLIC OF','KW' => 'KUWAIT','KG' => 'KYRGYZSTAN','LA' => 'LAO PEOPLES DEMOCRATIC REPUBLIC','LV' => 'LATVIA','LB' => 'LEBANON','LS' => 'LESOTHO','LR' => 'LIBERIA','LY' => 'LIBYAN ARAB JAMAHIRIYA','LI' => 'LIECHTENSTEIN','LT' => 'LITHUANIA','LU' => 'LUXEMBOURG','MO' => 'MACAU','MK' => 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF','MG' => 'MADAGASCAR','MW' => 'MALAWI','MY' => 'MALAYSIA','MV' => 'MALDIVES','ML' => 'MALI','MT' => 'MALTA','MH' => 'MARSHALL ISLANDS','MQ' => 'MARTINIQUE','MR' => 'MAURITANIA','MU' => 'MAURITIUS','YT' => 'MAYOTTE','MX' => 'MEXICO','FM' => 'MICRONESIA, FEDERATED STATES OF','MD' => 'MOLDOVA, REPUBLIC OF','MC' => 'MONACO','MN' => 'MONGOLIA','MS' => 'MONTSERRAT','MA' => 'MOROCCO','MZ' => 'MOZAMBIQUE','MM' => 'MYANMAR','NA' => 'NAMIBIA','NR' => 'NAURU','NP' => 'NEPAL','NL' => 'NETHERLANDS','AN' => 'NETHERLANDS ANTILLES','NC' => 'NEW CALEDONIA','NZ' => 'NEW ZEALAND','NI' => 'NICARAGUA','NE' => 'NIGER','NG' => 'NIGERIA','NU' => 'NIUE','NF' => 'NORFOLK ISLAND','MP' => 'NORTHERN MARIANA ISLANDS','NO' => 'NORWAY','OM' => 'OMAN','PK' => 'PAKISTAN','PW' => 'PALAU','PS' => 'PALESTINIAN TERRITORY, OCCUPIED','PA' => 'PANAMA','PG' => 'PAPUA NEW GUINEA','PY' => 'PARAGUAY','PE' => 'PERU','PH' => 'PHILIPPINES','PN' => 'PITCAIRN','PL' => 'POLAND','PT' => 'PORTUGAL','PR' => 'PUERTO RICO','QA' => 'QATAR','RE' => 'REUNION','RO' => 'ROMANIA','RU' => 'RUSSIAN FEDERATION','RW' => 'RWANDA','SH' => 'SAINT HELENA','KN' => 'SAINT KITTS AND NEVIS','LC' => 'SAINT LUCIA','PM' => 'SAINT PIERRE AND MIQUELON','VC' => 'SAINT VINCENT AND THE GRENADINES','WS' => 'SAMOA','SM' => 'SAN MARINO','ST' => 'SAO TOME AND PRINCIPE','SA' => 'SAUDI ARABIA','SN' => 'SENEGAL','SC' => 'SEYCHELLES','SL' => 'SIERRA LEONE','SG' => 'SINGAPORE','SK' => 'SLOVAKIA','SI' => 'SLOVENIA','SB' => 'SOLOMON ISLANDS','SO' => 'SOMALIA','ZA' => 'SOUTH AFRICA','GS' => 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS','ES' => 'SPAIN','LK' => 'SRI LANKA','SD' => 'SUDAN','SR' => 'SURINAME','SJ' => 'SVALBARD AND JAN MAYEN','SZ' => 'SWAZILAND','SE' => 'SWEDEN','CH' => 'SWITZERLAND','SY' => 'SYRIAN ARAB REPUBLIC','TW' => 'TAIWAN, PROVINCE OF CHINA','TJ' => 'TAJIKISTAN','TZ' => 'TANZANIA, UNITED REPUBLIC OF','TH' => 'THAILAND','TG' => 'TOGO','TK' => 'TOKELAU','TO' => 'TONGA','TT' => 'TRINIDAD AND TOBAGO','TN' => 'TUNISIA','TR' => 'TURKEY','TM' => 'TURKMENISTAN','TC' => 'TURKS AND CAICOS ISLANDS','TV' => 'TUVALU','UG' => 'UGANDA','UA' => 'UKRAINE','AE' => 'UNITED ARAB EMIRATES','GB' => 'UNITED KINGDOM','US' => 'UNITED STATES','UM' => 'UNITED STATES MINOR OUTLYING ISLANDS','UY' => 'URUGUAY','UZ' => 'UZBEKISTAN','VU' => 'VANUATU','VE' => 'VENEZUELA','VN' => 'VIET NAM','VG' => 'VIRGIN ISLANDS, BRITISH','VI' => 'VIRGIN ISLANDS, U.S.','WF' => 'WALLIS AND FUTUNA','EH' => 'WESTERN SAHARA','YE' => 'YEMEN','YU' => 'YUGOSLAVIA','ZM' => 'ZAMBIA','ZW' => 'ZIMBABWE');

		const RECAPTCHA_VERIFY 					= 'https://www.google.com/recaptcha/api/siteverify';
		const FAQ_PAYMENT_URL					= 'https://faq.miniorange.com/knowledgebase/all-i-want-to-do-is-upgrade-to-a-premium-licence/';
		const LOGIN_ATTEMPTS_EXCEEDED 			= "User exceeded allowed login attempts.";
		const BLOCKED_BY_ADMIN 		 			= "Blocked by Admin";
		const IP_RANGE_BLOCKING 				= "IP Range Blocking";
		const FAILED_LOGIN_ATTEMPTS_FROM_NEW_IP = "Failed login attempts from new IP.";
		const LOGGED_IN_FROM_NEW_IP 			= "Logged in from new IP.";
		const ATTACK_LIMIT_EXCEEDED             = "ale";
		const RATE_LIMIT_EXCEEDED               = "rle";
		const RATE_LIMIT_EXCEEDED_CRAWLER_ATTACK= "rlecrawler";
		const PLUGIN 							= 'plugin';
        const THEMES							= 'themes';
        const WPFILES							= 'wpfiles';
        const DATABASE 							= 'db';
        const CloudLockedOut 			='https://faq.miniorange.com/knowledgebase/how-to-gain-access-to-my-website-if-i-get-locked-out/';
        const OnPremiseLockedOut 			='https://faq.miniorange.com/knowledgebase/i-am-locked-cant-access-my-account-what-do-i-do/';

        public static $repo_status_code = array(-96 => 'Maximum execution time exceeded while downloading files from repository. Please contact miniOrange.', -97 => '<i>Uploads Folder</i> permission denied', -98 => '2 Factor authentication plugin unable to reach wordpress repository files. Please contact miniOrange.', -99 => 'Unable to download Wordpress, plugins and themes from Repository', -100 => 'Unable to unzip the Wordpress, plugins and themes');

        public static $host = 'http://scanner.api.xecurify.com/malwareservice/rest/file/upload';

        public static $hostname = 'scanner.api.xecurify.com';

        public static $quick_scan_configuration = array('plugin_scan' => 1 ,
												'theme_scan'  => 1,
												'core_scan'	  => 0,
												'file_extension' => "",
												'check_vulnerable' => 1,
												'check_sql' => 1,
												'check_rfi' => 1,
												'ext_link_check' => 0,
												'check_repo' => 0,
												'path_skip' => "",
												'type_scan' => "Quick Scan"
												);
        public static $standard_scan_configuration = array('plugin_scan' => 1 ,
												'theme_scan'  => 1,
												'core_scan'	  => 0,
												'file_extension' => "",
												'check_vulnerable' => 1,
												'check_sql' => 1,
												'check_rfi' => 1,
												'ext_link_check' => 1,
												'check_repo' => 1,
												'path_skip' => "",
												'type_scan' => "Standard Scan"
												);
	
		function __construct()
		{
			$this->define_global();
		}

		function define_global()
		{
			global $wpnsDbQueries,$moWpnsUtility,$mo2f_dirName,$Mo2fdbQueries;
			$wpnsDbQueries	 	= new MoWpnsDB();
			$moWpnsUtility  = new MoWpnsUtility();
			$mo2f_dirName 		= dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR;
			$Mo2fdbQueries = new Mo2fDB();
		}
		
	}
	new MoWpnsConstants;

?>