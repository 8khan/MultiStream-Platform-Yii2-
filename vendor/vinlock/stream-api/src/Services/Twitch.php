<?php
/**
 * Website: vinlock-twitch-api
 * Created By: Vinlock
 * Date: 5/29/16 5:29 PM
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */

namespace Vinlock\StreamAPI\Services;



use Vinlock\StreamAPI\StreamDriver;
use Vinlock\StreamAPI\StreamObjects\Stream;

class Twitch extends Service {

    function __construct($usernames) {
        if (!is_array($usernames) && is_string($usernames)) {
            $array = [ $usernames ];
        }

        $this->streams = StreamDriver::getStream($usernames, 'twitch');
    }

    public static function game($game) {
        $streams = StreamDriver::byGame($game, 'twitch');
        return new Service($streams);
    }

    public static function games(){
        $streams = StreamDriver::allGames('twitch');
        return new Service($streams);
    }

}