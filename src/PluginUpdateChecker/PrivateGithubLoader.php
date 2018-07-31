<?php
namespace GuillaumeMolter\PluginUpdateChecker;

/**
 * PrivateGithubSetup Class.
 */
class PrivateGithubLoader
{

    /**
     * The Github Token to fetch private repo data.
     *
     * @var string
     */
    private $github_token;

    /**
     * The Github username or org.
     *
     * @var string
     */
    public $github_user;

    /**
     * The Github repo slug.
     *
     * @var string
     */
    public $github_repo;

    /**
     * The Github branch.
     *
     * @var string
     */
    public $github_branch;

    /**
     * Class constructor.
     */
    public function __construct(
        string $github_user,
        string $github_repo,
        string $github_token,
        string $github_branch = 'master'
    ) {
        $this->github_user   = $github_user;
        $this->github_repo   = $github_repo;
        $this->github_token  = $github_token;
        $this->github_branch = $github_branch;
    }

    /**
     * Plugin init function - register plugin hooks
     *
     * @return void
     */
    public function init()
    {
        if (! empty($this->github_token)
            && ! empty($this->github_user)
            && ! empty($this->github_repo)
            && ! empty($this->github_branch)
        ) {
            try {
                $updater = Puc_v4_Factory::buildUpdateChecker(
                    'https://github.com/' . $this->github_user . '/' . $this->github_repo,
                    __FILE__,
                    $this->github_repo
                );
                $updater->setAuthentication($this->github_token);
                $updater->setBranch($this->github_branch);
            } catch (Exception $e) {
                echo 'PluginUpdateChecker caught an exception: ' .  $e->getMessage() . "\n";
            }
        }
    }
}
