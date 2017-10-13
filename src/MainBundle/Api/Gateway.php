<?php

namespace MainBundle\Api;

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Gateway
{
    /**
     * @var Client
     */
    private $client;

    /**
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param bool $cache
     * @param int $cacheTTL
     * @return \GuzzleHttp\Message\ResponseInterface
     */
    public function getVersion($cache = false, $cacheTTL = 0)
    {
        $response = $this->client->get('/version', Client::FORMAT_JSON, [], [], $cache, $cacheTTL);

        return $response['body'];
    }

    /**
     * @param  string       $mail
     * @param  string       $list
     * @return array|string
     */
    public function createSubscriber($mail, $list)
    {
        $response = $this->client->post(
            '/v1/newsletter/subscriber',
            Client::FORMAT_JSON,
            [
                'mail' => $mail,
                'list' => $list
            ]
        );

        return $response;
    }

    /**
     * @return array|string
     */
    public function getClubsMap()
    {
        $response = $this->client->get(
            '/v1/clubs/map',
            Client::FORMAT_JSON,
            [],
            [],
            true,
            3600
        );

        return $response;
    }

    /**
     * @param $slug
     * @param  bool                                  $cache
     * @param  int                                   $cacheTTL
     * @return \GuzzleHttp\Message\ResponseInterface
     */
    public function getClubBySlug($slug, $cache = false, $cacheTTL = 0)
    {
        $response = $this->client->get("/v1/organizationclubs/$slug?count_members=true", Client::FORMAT_JSON, [], [], $cache, $cacheTTL);

        return $response['body'];
    }

    /**
     * @param bool $cache
     * @param int $cacheTTL
     * @return mixed
     */
    public function getLessonTypes($cache = false, $cacheTTL = 0)
    {
        $response = $this->client->get("/v1/clubs/lesson_types", Client::FORMAT_JSON, [], [], $cache, $cacheTTL);

        return $response['body'];
    }

    /**
     * @param $slug
     * @param bool $cache
     * @param int $cacheTTL
     * @return mixed
     */
    public function getClubCampaignsBySlug($slug, $cache = false, $cacheTTL = 0)
    {
        $response = $this->client->get("/v1/campaigns/organizations/$slug", Client::FORMAT_JSON, [], [], $cache, $cacheTTL);

        return $response['body'];
    }

    /**
     * Get all committees
     *
     * @param  bool                                  $cache
     * @param  int                                   $cacheTTL
     * @return \GuzzleHttp\Message\ResponseInterface
     */
    public function getCommittees($cache = false, $cacheTTL = 0)
    {
        $response = $this->client->get('/v1/committees', Client::FORMAT_JSON, [], [], $cache, $cacheTTL);

        return $response['body'];
    }

    /**
     * @param bool $cache
     * @param int $cacheTTL
     * @return mixed
     */
    public function getCbome($cache = false, $cacheTTL = 0)
    {
        $response = $this->client->get('/v1/cbome', Client::FORMAT_JSON, [], [], $cache, $cacheTTL);

        return $response['body'];
    }

    /**
     * @param $slug
     * @param  bool         $cache
     * @param  int          $cacheTTL
     * @return array|string
     */
    public function getContentPageBySlug($slug, $cache = false, $cacheTTL = 0)
    {
        $response = $this->client->get('/v1/cms/contents/'.$slug.'/page.json', Client::FORMAT_JSON, [], [], $cache, $cacheTTL);

        return $response['body'];
    }

    /**
     * @param $slug
     * @param  bool                                  $cache
     * @param  int                                   $cacheTTL
     * @return \GuzzleHttp\Message\ResponseInterface
     */
    public function getContentBySlug($slug, $cache = false, $cacheTTL = 0)
    {
        try{

            return $this->client->get('/v1/cms/articles/'.$slug.'.json', Client::FORMAT_JSON, [], [], $cache, $cacheTTL)['body'];
            
        }catch (NotFoundHttpException $e){
            throw new NotFoundHttpException('La page demandée ' . $slug. ' n\'existe pas');
        }
    }

    /**
     * @param $slug
     * @param  bool                                  $cache
     * @param  int                                   $cacheTTL
     * @return \GuzzleHttp\Message\ResponseInterface
     */
    public function getDealBySlug($slug, $cache = false, $cacheTTL = 0)
    {
        $response = $this->client->get('/v1/cms/deals/'.$slug.'.json', Client::FORMAT_JSON, [], [], $cache, $cacheTTL);

        return $response['body'];
    }

    /**
     * @param  string                                $slug
     * @param  boolean                               $cache
     * @param  integer                               $cacheTTL
     * @return \GuzzleHttp\Message\ResponseInterface
     */
    public function showArchive($slug, $cache = false, $cacheTTL = 0)
    {
        return $this->client->get("/v1/cms/archives/$slug.json", Client::FORMAT_JSON, [], [], $cache, $cacheTTL);
    }

    /**
     * @param $page
     * @param $maxPerPage
     * @param  boolean                               $cache
     * @param  integer                               $cacheTTL
     * @return \GuzzleHttp\Message\ResponseInterface
     */
    public function getArchives($page, $maxPerPage, $cache = false, $cacheTTL = 0)
    {
        return $this->client->get("/v1/cms/archives.json?max_per_page=$maxPerPage&page=$page", Client::FORMAT_JSON, [], [], $cache, $cacheTTL)['body'];
    }

    /**
     * @param  string                                $collection
     * @param  int                                   $page
     * @param  null|int                              $offset
     * @param  int                                   $maxPerPage
     * @param  bool                                  $cache
     * @param  int                                   $cacheTTL
     * @return \GuzzleHttp\Message\ResponseInterface
     */
    public function getArticles($collection = null, $page = 1, $offset = null, $maxPerPage = 10, $cache = false, $cacheTTL = 0)
    {
        return $this->client->get(
            '/v1/cms/articles/collection/'.$collection.'/page/'.$page.'.json',
            Client::FORMAT_JSON,
            [
                'collection' => $collection,
                'count' => (int) $maxPerPage,
                'offset' => $offset,
                'sort' => 'position,-publicationDateStart'
            ],
            [],
            $cache,
            $cacheTTL
        );
    }

    /**
     * envoie des données au cms pour validation
     *
     * @param  array $data liste des données
     * @return array
     */
    public function postPartner(array $data)
    {
        return $this->client->post(
            '/v1/cms/partners/subscribes.json',
            Client::FORMAT_JSON,
            [
                'firstname' => $data['firstname'],
                'lastname' => $data['lastname'],
                'phone' => $data['phone'],
                'company' => $data['company'],
                'function' => $data['function'],
                'email' => $data['mail'],
                'content' => $data['content']
            ]
        );
    }

    /**
     * @param $slug
     * @param  bool                                  $cache
     * @param  int                                   $cacheTTL
     * @return \GuzzleHttp\Message\ResponseInterface
     */
    public function getPartnerBySlug($slug, $cache = false, $cacheTTL = 0)
    {
        $response = $this->client->get('/v1/cms/partner/'.$slug.'.json', Client::FORMAT_JSON, [], [], $cache, $cacheTTL);

        return $response['body'];
    }

    /**
     * @param $username
     * @param $password
     * @return null|string
     */
    public function getToken($username, $password)
    {
        return $this->client->auth($username, $password, 1);
    }

    public function getMyUserRoles($token)
    {
        $response = $this->client->get('/v1/users/me/roles', Client::FORMAT_JSON, [], ['Authorization' => 'Bearer '.$token]);

        return $response['body'];
    }

    public function getMyInfo($token)
    {
        $response = $this->client->get('/v1/users/my/infos', Client::FORMAT_JSON, [], ['Authorization' => 'Bearer '.$token]);

        return $response['body'];
    }

    /**
    * @param string $token
    * @param string $licenseeId
    * @param string $lastname
    */
    public function getLicenseeByLicenseeIdAndLastname($token, $licenseeId, $lastname) {
        $response = $this->client->get(
            '/v1/licensees/by-licensee-id?licensee_id=' . $licenseeId . '&lastname=' . $lastname,
            Client::FORMAT_JSON,
            [],
            ['Authorization' => 'Bearer '. $token]
        );
        return $response['body'];
    } 

    /**
     * @param $token
     * @param $licenseeId
     * @return mixed
     */
    public function requestLicenseeTokenByLicenseeId($token, $licenseeId)
    {
        $response = $this->client->put(
            '/v1/licensees/request-reset-token' ,
            Client::FORMAT_JSON,
            ['licensee_id'=>$licenseeId],
            ['Authorization' => 'Bearer '. $token]
        );
        return $response['body'];
    }

    /**
     * @param $gender
     * @param $firstname
     * @param $lastname
     * @param $email
     * @param $birthdate
     * @param $magazineMailSubscription
     * @param $magazinePostSubscription
     * @param $newsletterSubscriptionPro
     * @param $newsletterSubscriptionLicensee
     * @param $tournamentResultSubscription
     * @param $competitionResultSubscription
     * @param $allowClubNotification
     * @param $allowCommitteeNotification
     * @param $allowFFBbNotification
     * @param $cnilApproval
     * @param $token
     * @param $show_joy_ride
     * @return array
     */
    public function postMyInfo(
        $gender,
        $firstname,
        $lastname,
        $email,
        $birthdate,
        $magazineMailSubscription,
        $magazinePostSubscription,
        $newsletterSubscriptionPro,
        $newsletterSubscriptionLicensee,
        $tournamentResultSubscription,
        $competitionResultSubscription,
        $allowClubNotification,
        $allowCommitteeNotification,
        $allowFFBbNotification,
        $cnilApproval,
        $token,
        $show_joy_ride
    ) {
        return $this->client->post(
            '/v1/users/my/infos',
            Client::FORMAT_RAW,
            [
                'gender' => $gender,
                'firstname' => $firstname,
                'lastname' => $lastname,
                'email' => $email,
                'birthdate' => $birthdate,
                'magazine_mail_subscription' => (bool) $magazineMailSubscription,
                'magazine_post_subscription' => (bool) $magazinePostSubscription,
                'newsletter_subscription_pro' => (bool) $newsletterSubscriptionPro,
                'newsletter_subscription_licensee' => (bool) $newsletterSubscriptionLicensee,
                'tournament_result_subscription' => (bool) $tournamentResultSubscription,
                'competition_result_subscription' => (bool) $competitionResultSubscription,
                'allow_club_notification' => (bool) $allowClubNotification,
                'allow_committee_notification' => (bool) $allowCommitteeNotification,
                'allow_ffb_notification' => (bool) $allowFFBbNotification,
                'cnil_approval' => (bool) $cnilApproval,
                'show_joy_ride' => (bool) $show_joy_ride
            ],
            ['Authorization' => 'Bearer '.$token]
        );
    }

    /**
     * @param $token
     * @param $personId
     * @return mixed
     */
    public function generateEmailConfirmationToken($token,$personId)
    {
        return $this->client->post(
            '/v1/resetting/send-confirmation-email', Client::FORMAT_RAW, ['person_id' => $personId],
            ['Authorization' => 'Bearer '.$token]
        )['body'];
    }

    /**
     * post contact us data
     * @param array $data
     * @return array
     */
    public function postContact(array $data)
    {
        return $this->client->post(
            '/v1/cms/contacts/pub.json',
            Client::FORMAT_JSON,
            [
                'subject' => $data['subject'],
                'pattern' => $data['pattern'],
                'gender' => $data['gender'],
                'firstname' => $data['firstname'],
                'lastname' => $data['lastname'],
                'phone' => $data['phone'],
                'email' => $data['email'],
                'content' => $data['content'],
            ]
        );
    }

    /**
     * @param string $token
     * @param string $email
     * @param string $licenseeId
     * @return array
     */
    public function checkEmail($token, $email, $licenseeId) {
        return $this->client->post(
            '/v1/credentials/check-email', Client::FORMAT_RAW, ['email' => $email, 'licensee_id' => $licenseeId],
            ['Authorization' => 'Bearer '.$token]
        )['body'];
    }

    /**
     * @param bool $cache
     * @param int $cacheTTL
     * @return \GuzzleHttp\Message\ResponseInterface
     */
    public function getContactClassification($cache = false, $cacheTTL = 0)
    {
        $response = $this->client->get('/v1/cms/contacts/pub/classification.json', Client::FORMAT_JSON, [], [], $cache, $cacheTTL);

        return $response['body'];
    }


    /**
     * Get a list of the license type
     *
     * @param  bool                                  $cache
     * @param  int                                   $cacheTTL
     * @return \GuzzleHttp\Message\ResponseInterface
     */
    public function getLicenseType($cache = false, $cacheTTL = 0)
    {
        $response = $this->client->get('/v1/licenses-types', Client::FORMAT_JSON, [], [], $cache, $cacheTTL);

        return $response['body'];
    }


    /**
     * @param bool $cache
     * @param int $cacheTTL
     * @return \GuzzleHttp\Message\ResponseInterface
     */
    public function getPressArea($cache = false, $cacheTTL = 0)
    {
        $response = $this->client->get('/v1/cms/communicated.json', Client::FORMAT_JSON, [], [], $cache, $cacheTTL);

        return $response['body'];
    }

    /**
     * @param string $applicationToken
     * @param string $activationToken
     * @return array
     */
    public function getLicenseeByActivationToken($applicationToken, $activationToken) {
        return $this->client->get(
            "/v1/users/activation-token/$activationToken",
            Client::FORMAT_JSON,
            [],
            ['Authorization' => "Bearer $applicationToken"]
        )['body'];
    }

    /**
     * @param string $token
     * @return boolean
     */
    public function validateToken($token) {
        try{
            $this->client->post("/v1/credentials/$token");
            return true;
        } catch (ClientException $ex) {
            return false;
        }
    }

    /**
     * @param string $token
     * @param string $password
     * @return array
     */
    public function updatePassword($token, $password) {
        return $this->client->post('/v1/credentials/reset-password', Client::FORMAT_JSON, [
            'token' => $token,
            'password' => $password
        ]);
    }

    /**
     * @param $username
     * @param bool $cnilApproval
     * @return array
     */
    public function postTermsApproval($username, $cnilApproval = false) {
        try {
            return $this->client->post('/v1/users/terms-approval', Client::FORMAT_JSON, [
                'username' => $username,
                'cnil_approval' => $cnilApproval
            ]);
        } catch (\Exception $ex) {
            return [
                'body' => [
                    'message' => $ex->getMessage()
                ],
                'code' => 400
            ];
        }
    }

    /**
     * @param $email
     * @return array
     */
    public function postEmailResetting($email) {
        try {
            return $this->client->post('/v1/resetting/send-password', Client::FORMAT_JSON, [
                'email' => $email,
            ]);
        } catch (ServerException $ex) {
            return [
                'body' => ['message' => $ex->getMessage()],
                'code' => 400
            ];
        }
    }

    /**
     * @param $datas
     * @return array
     */
    public function postNewsletterData($datas) {
        try {
            return $this->client->post('/v1/mailjet', Client::FORMAT_JSON, [ $datas ]);
        } catch (\Exception $ex) {
            return [
                'body' => ['message' => $ex->getMessage()], 'code' => 400
            ];
        }
    }

    /**
     * @param $apiToken
     * @param $userId
     * @param $emailValidationToken
     * @return mixed
     */
    public function validateEmail($apiToken, $userId, $emailValidationToken) {
        return $this->client->post(
            '/v1/credentials/validate-email', Client::FORMAT_RAW, ['user_id' => $userId, 'email_token' => $emailValidationToken],
            ['Authorization' => 'Bearer ' . $apiToken]
        )['body'];
    }

}
