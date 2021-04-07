<?php

  namespace WebpConverter\Settings;

  use WebpConverter\Loader\LoaderAbstract;
  use WebpConverter\Loader\Passthru;
  use WebpConverter\Traits\FileLoaderTrait;

  class Errors
  {
    use FileLoaderTrait;

    const PATH_SOURCE_FILE_PNG  = '/public/img/icon-test.png';
    const PATH_SOURCE_FILE_PNG2 = '/public/img/icon-test.png2';
    const PATH_OUTPUT_FILE_PNG  = '/webp-converter-for-media-test.png';
    const PATH_OUTPUT_FILE_PNG2 = '/webp-converter-for-media-test.png2';
    const ERRORS_CACHE_OPTION   = 'webpc_errors_cache';

    private $cache    = null;
    private $filePath = WEBPC_PATH . '/resources/components/errors/%s.php';

    public function __construct()
    {
      add_filter('webpc_server_errors', [$this, 'getServerErrors']);
    }

    /* ---
      Functions
    --- */

    public function getServerErrors()
    {
      if ($this->cache !== null) return $this->cache;

      $this->cache = $this->loadErrorMessages();
      return $this->cache;
    }

    private function loadErrorMessages()
    {
      $errors = $this->getErrorsList();
      $list   = [];
      foreach ($errors as $error) {
        ob_start();
        include sprintf($this->filePath, str_replace('_', '-', $error));
        $list[$error] = ob_get_contents();
        ob_end_clean();
      }

      update_option(self::ERRORS_CACHE_OPTION, array_keys($list));
      return $list;
    }

    private function getErrorsList()
    {
      $errors = [];

      if ($this->ifLibsAreInstalled() !== true) {
        $errors[] = 'libs_not_installed';
      } else if ($this->ifLibsSupportWebp() !== true) {
        $errors[] = 'libs_without_webp_support';
      }
      if ($errors) return $errors;

      if ($this->ifSettingsAreCorrect() !== true) {
        $errors[] = 'settings_incorrect';
      }
      if ($errors) return $errors;

      if ($this->ifRestApiIsEnabled() !== true) {
        $errors[] = 'rest_api_disabled';
      }
      if ($this->ifUploadsPathExists() !== true) {
        $errors[] = 'path_uploads_unavailable';
      } else if ($this->ifHtaccessIsWriteable() !== true) {
        $errors[] = 'path_htaccess_not_writable';
      }
      if ($this->ifPathsAreDifferent() !== true) {
        $errors[] = 'path_webp_duplicated';
      } else if ($this->ifWebpPathIsWriteable() !== true) {
        $errors[] = 'path_webp_not_writable';
      }
      if ($errors) return $errors;

      $this->convertImagesForDebug();

      if ($this->ifPassthruExecutionAllowed() !== true) {
        $errors[] = 'passthru_execution';
      }
      if ($errors) return $errors;

      if ($this->ifRedirectsAreWorks() !== true) {
        if ($this->ifBypassingApacheIsActive() === true) {
          $errors[] = 'bypassing_apache';
        } else {
          $errors[] = 'rewrites_not_working';
        }
      } else if ($this->ifRedirectsAreCached() === true) {
        $errors[] = 'rewrites_cached';
      }

      return $errors;
    }

    private function ifLibsAreInstalled()
    {
      return (extension_loaded('gd') || (extension_loaded('imagick') && class_exists('\Imagick')));
    }

    private function ifLibsSupportWebp()
    {
      $methods = apply_filters('webpc_get_methods', []);
      return (count($methods) > 0);
    }

    private function ifSettingsAreCorrect()
    {
      $settings = apply_filters('webpc_get_values', [], true);
      if ((!isset($settings['extensions']) || !$settings['extensions'])
        || (!isset($settings['dirs']) || !$settings['dirs'])
        || (!isset($settings['method']) || !$settings['method'])
        || (!isset($settings['quality']) || !$settings['quality'])) return false;

      return true;
    }

    private function ifRestApiIsEnabled()
    {
      return ((apply_filters('rest_enabled', true) === true)
        && (apply_filters('rest_jsonp_enabled', true) === true)
        && (apply_filters('rest_authentication_errors', true) === true));
    }

    private function ifUploadsPathExists()
    {
      $path = apply_filters('webpc_dir_path', '', 'uploads');
      return (is_dir($path) && ($path !== ABSPATH));
    }

    private function ifHtaccessIsWriteable()
    {
      $pathDir  = apply_filters('webpc_dir_path', '', 'uploads');
      $pathFile = $pathDir . '/.htaccess';
      if (file_exists($pathFile)) return (is_readable($pathFile) && is_writable($pathFile));
      else return is_writable($pathDir);
    }

    private function ifPathsAreDifferent()
    {
      $pathUploads = apply_filters('webpc_dir_path', '', 'uploads');
      $pathWebp    = apply_filters('webpc_dir_path', '', 'webp');
      return ($pathUploads !== $pathWebp);
    }

    private function ifWebpPathIsWriteable()
    {
      $path = apply_filters('webpc_dir_path', '', 'webp');
      return (is_dir($path) || is_writable(dirname($path)));
    }

    private function convertImagesForDebug()
    {
      $uploadsDir = apply_filters('webpc_dir_path', '', 'uploads');
      if (!is_writable($uploadsDir)) return;

      $paths = apply_filters('webpc_files_paths', [
        $uploadsDir . self::PATH_OUTPUT_FILE_PNG,
        $uploadsDir . self::PATH_OUTPUT_FILE_PNG2,
      ], true);
      if (!$paths) return;

      copy(WEBPC_PATH . self::PATH_SOURCE_FILE_PNG, $uploadsDir . self::PATH_OUTPUT_FILE_PNG);
      copy(WEBPC_PATH . self::PATH_SOURCE_FILE_PNG2, $uploadsDir . self::PATH_OUTPUT_FILE_PNG2);

      add_filter('webpc_gd_create_methods', [$this, 'setMethodsForDebug']);
      add_filter('webpc_get_values',        ['WebpConverter\Settings\Errors', 'setExtensionsForDebug']);
      do_action(LoaderAbstract::ACTION_NAME, true);

      do_action('webpc_convert_paths', $paths);

      remove_filter('webpc_gd_create_methods', [$this, 'setMethodsForDebug']);
      remove_filter('webpc_get_values',        ['WebpConverter\Settings\Errors', 'setExtensionsForDebug']);
      do_action(LoaderAbstract::ACTION_NAME, true);
    }

    public function setMethodsForDebug($methods)
    {
      $methods['imagecreatefrompng'][] = 'png2';
      return $methods;
    }

    public static function setExtensionsForDebug($settings)
    {
      $settings['extensions'] = array_unique(array_merge(
        ['png2', 'png'],
        $settings['extensions']
      ));
      return $settings;
    }

    private function ifPassthruExecutionAllowed()
    {
      if (Passthru::isActiveLoader() !== true) {
        return true;
      }

      $url = Passthru::getLoaderUrl() . '?nocache=1';
      $ch  = curl_init($url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_NOBODY, 1);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
      curl_setopt($ch, CURLOPT_TIMEOUT, 3);
      curl_exec($ch);
      $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
      curl_close($ch);

      return ($code === 200);
    }

    private function ifRedirectsAreWorks()
    {
      $uploadsUrl = apply_filters('webpc_dir_url', '', 'uploads');
      $sourceFile = apply_filters('webpc_dir_path', '', 'uploads') . self::PATH_OUTPUT_FILE_PNG;

      do_action('webpc_convert_paths', apply_filters('webpc_files_paths', [
        $sourceFile,
      ], true));

      $fileSize = $this->getFileSizeByPath($sourceFile);
      $fileWebp = $this->getFileSizeByUrl($uploadsUrl . self::PATH_OUTPUT_FILE_PNG);

      return ($fileWebp < $fileSize);
    }

    private function ifBypassingApacheIsActive()
    {
      $uploadsUrl = apply_filters('webpc_dir_url', '', 'uploads');

      add_filter('webpc_get_values', ['WebpConverter\Settings\Errors', 'setExtensionsForDebug']);
      do_action(LoaderAbstract::ACTION_NAME, true);

      $filePng  = $this->getFileSizeByUrl($uploadsUrl . self::PATH_OUTPUT_FILE_PNG);
      $filePng2 = $this->getFileSizeByUrl($uploadsUrl . self::PATH_OUTPUT_FILE_PNG2);

      remove_filter('webpc_get_values', ['WebpConverter\Settings\Errors', 'setExtensionsForDebug']);
      do_action(LoaderAbstract::ACTION_NAME, true);

      return ($filePng > $filePng2);
    }

    private function ifRedirectsAreCached()
    {
      $uploadsUrl   = apply_filters('webpc_dir_url', '', 'uploads');
      $fileWebp     = $this->getFileSizeByUrl($uploadsUrl . self::PATH_OUTPUT_FILE_PNG);
      $fileOriginal = $this->getFileSizeByUrl($uploadsUrl . self::PATH_OUTPUT_FILE_PNG, false);

      return (($fileWebp > 0) && ($fileWebp === $fileOriginal));
    }
  }