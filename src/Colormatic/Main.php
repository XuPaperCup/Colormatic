<?php
namespace Colormatic;

use pocketmine\Server;
use pocketmine\Player;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\event\player\PlayerCommandPreprocessEvent;
use pocketmine\event\TranslationContainer;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat;

class Main extends PluginBase implements Listener{
    
      public function onEnable(){
          $this->getServer()->getPluginManager()->registerEvents($this, $this);
          @mkdir($this->getDataFolder());
          $this->saveResource("config.yml");        
          $this->getMainConfig = new Config($this->getdatafolder() . "config.yml", Config::YAML);
          $this->getLogger()->info("§1C§2o§3l§4o§5r§6m§7a§8t§9i§ac§r Loaded§b!");
      } 
    
    public function onChat(PlayerChatEvent $ev){
        $message = $ev->getMessage();
        $ev->setMessage($this->getServer()->getLanguage()->translateString($this->translateColors($this->getMainConfig()->get("Color Symbol"), $message)));
    }
    
    public function translateColors($symbol, $message) {
        $message = str_replace($symbol."0", TextFormat::BLACK, $message);
        $message = str_replace($symbol."1", TextFormat::DARK_BLUE, $message);
        $message = str_replace($symbol."2", TextFormat::DARK_GREEN, $message);
        $message = str_replace($symbol."3", TextFormat::DARK_AQUA, $message);
        $message = str_replace($symbol."4", TextFormat::DARK_RED, $message);
        $message = str_replace($symbol."5", TextFormat::DARK_PURPLE, $message);
        $message = str_replace($symbol."6", TextFormat::GOLD, $message);
        $message = str_replace($symbol."7", TextFormat::GRAY, $message);
        $message = str_replace($symbol."8", TextFormat::DARK_GRAY, $message);
        $message = str_replace($symbol."9", TextFormat::BLUE, $message);
        $message = str_replace($symbol."a", TextFormat::GREEN, $message);
        $message = str_replace($symbol."b", TextFormat::AQUA, $message);
        $message = str_replace($symbol."c", TextFormat::RED, $message);
        $message = str_replace($symbol."d", TextFormat::LIGHT_PURPLE, $message);
        $message = str_replace($symbol."e", TextFormat::YELLOW, $message);
        $message = str_replace($symbol."f", TextFormat::WHITE, $message);

        $message = str_replace($symbol."k", TextFormat::OBFUSCATED, $message);
        $message = str_replace($symbol."l", TextFormat::BOLD, $message);
        $message = str_replace($symbol."m", TextFormat::STRIKETHROUGH, $message);
        $message = str_replace($symbol."n", TextFormat::UNDERLINE, $message);
        $message = str_replace($symbol."o", TextFormat::ITALIC, $message);
        $message = str_replace($symbol."r", TextFormat::RESET, $message);
        return $message;
    }
    
    public function getMainConfig(){
        return $this->getMainConfig;
    }
}
