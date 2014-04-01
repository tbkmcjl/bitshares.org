      <div class="article">
         
         <h2> Introduction </h2>
         <p>
         BitShares X is an experiment to test the economic theory behind a new kind of prediction market. 
         This experiment creates a <i>decentralized</i> bank &amp; exchange that uses a decentralized 
         transaction ledger secured by <a href="/security/TaPOS/">TaPOS</a> to create fungible digital 
         assets, called <a href="/faq/index.php#bitasset">BitAssets</a>,  that are market-pegged to the 
         value of anything from dollars, to gold, to gallons of gasoline.  Like all DACs BitShares X has 
         shares that can be transferred between users in the same way as bitcoins.    What makes 
         BitShares X special is that it also implements a business model similar to existing banks or 
         brokerages.  For the purposes of this paper shares in BitShares X will be referred to as 
         <a href="/faq/index.php#mips">MIPS (micro-percent)</a> and we will be using 
         <a href="/faq/index.php#BitUSD">BitUSD</a>, as asset pegged to the United States Dollar, 
         as the example BitAsset.  
         </p>

         <p>
         BitShares X can create BitUSD by lending it into existence backed by collateral in the same way 
         that the banking system lends dollars into existence today.  Whereas your bank uses your house as 
         collateral, BitShares X uses MIPs (shares in the DAC) as collateral.   If the value of the collateral 
         falls relative to BitUSD then BitShares X will automatically <a href="/faq/index.php#cover">cover</a> 
         your loan by selling the MIPs held as collateral for BitUSD and giving the borrower whatever MIPs 
         are left over. 
         </p>

         <p>
         The reason someone borrows BitUSD is for the purpose of executing a <a href="/faq/index.php#short">short sell</a> 
         of BitUSD relative to MIPs.   This works in the same manner as shorting a stock.  First, you borrow the stock, 
         then you sell it at todays high prices.   If all goes well then you can buy it back tomorrow for less than you 
         paid today, pay off your loan, and keep the profit.   However, if things go against you then you will have to 
         pay more to buy back the stock than you sold it for in the first place and thus take a loss. 
         </p>

         <p>
         BitUSD is created when two people taking opposite positions can agree to a price and the only price at which two 
         people will agree is the current market price of USD per MIP otherwise one individual will start out losing money.
         The mechanics of the market peg are very similar to the mechanics of a prediction market.  Once the market has 
         reached a consensus that BitUSD should be valued the same as a real US Dollar no one will be able to trade against 
         that consensus without losing money.   Thus the value of BitUSD today is based upon the prediction of what market 
         participants will value BitUSD at in the future.   There is only one rational way to speculate, that the consensus 
         will hold, and that creates a self-enforcing market peg.  
         </p>

         <h3> Transaction Types </h3>
         <p>
         BitShares X is built upon the <a href="/bitshares/toolkit">bitshares toolkit</a> which provides the basic 
         transactions such as <a href="/bitshares/toolkit/details.php#claim_by_signature"><code>signature</code></a>,
         <a href="/bitshares/toolkit/details.php#multi-sig"><code>multi-signature</code></a>, and <code>claim by password</code> which
         is used for <a href="/bitshares/toolkit/details.php#cross-chain-trading">cross-chain trading</a>.
         </p>
         <ul>
            <li>claim by long</li>
            <li>claim by cover</li>
            <li>claim by option execute</li>
            <li>claim by bid</li>
            <li>claim by cove bid</li>
         </ul>

         <h4> User Generated Transactions </h4>
         <p>
         </p>

         <h4> Deterministic Transactions </h4>
         <p>
         In addition to the determinsitic transactions built into the <a href="/bitshares/toolkit/details.php#determinsitic_transactions">bitshares toolkit</a> to enforce the 5% inactivity fee, bitshares x also executes determinstic bid/ask pairing and automatic
         margin calls.  Given the prior state of the blockchain, these transactions are entirely determinsitic and all nodes
         verify that they match the reference algorithm.
         </p>

         <h3> Market Security </h3>
         <p>
         Because bitshares x supports margin calls and the order book is public, certain protections must be put in place to prevent
         market manipulation and ensure that the BitAssets remain market-pegged.  Part of this security is the requirement for an
         initial margin of at least 200% of the value of the short position and a maintenance margin of at least 150%.  
         </p>
         <p>
         All short positions (those borrowing BitUSD) must start out with enough MIPs as collateral to purchase 2x the BitUSD borrowed.   Margin calls are executed when the value of the collateral (MIPs) falls to 1.5x the value of BitUSD borrowed.   This gives the market ample opportunity to cover the short position and pay off the loan before there is insufficient collateral.  In the event that the market is forced to execute a margin call, a 5% fee will be assessed.  This should encourage participants to be pro-active in maintaining sufficient margin. 
         </p>

         <h4> Matching Algorithm </h4>
         <p>
         BitShares X uses a non-traditional order matching algorithm.  The algorithm chosen always gives the buyer exactly what they ask for instead of traditional order matching which gives the buyer at least what they ask for and sometimes more.    Any time a the highest bid is greater than the lowest ask the difference is captured as fees by the network.  In the case of BitShares X there is no distinction between buyer and seller because someone buying BIPS with USD is no different than someone buying USD with BIPS.   Both sides of the trade get the price they specified rather than using the same price for both parties.  The difference is kept as fees for the network.   
         </p>
         <center> <img src="/assets/img/marketmaker.png"/> </center>
         <p>
         The reason for this algorithm is to penalize those that would attempt to manipulate the market by walking the book via fees charged proportional to the amount of the book they walk in a single go.   This is designed to enforce value-based investing rather than technical trading.   This is expected to reduce volatility and liquidity as trading noise is removed from the network. No market participant should be able to complain about getting exactly what they ask for and thus they should only place orders they think are fair. 
         </p>

         <h4> Trading Open Conditions </h4>
         <p>
         Before the market can open and create the first BitAssets, there must be a minimal market depth around the
         consensus price.  The rules for this are under review but at the momment the design is as follows:
         </p>
         <ol>
            <li><b>Match all Shorts &amp; Longs</b> - this will eliminate the overlap and establish a buy/sell spread.</li>
            <li><b>Calculate the Reference Price</b> - this is done by averaging the highest remaining bid and lowest remaining ask.</li>
            <li><b>Validate Market Depth within +/-15% of Reference Price</b> - when both the bid &amp; ask volume are above the minimum threshold, called the <code>OPEN DEPTH</code>,  then the trades are committed and trading begins.</li>
         </ol>

         <h4> Trading Halt Conditions </h4>
         <p>
         There are certain market manipulation attacks that could attempt to undermine the market through triggering market calls or
         buying up the entire order book.  For this reason trading stops anytime the market depth +/-15% of the Reference Price is
         below the <code>RUNNING DEPTH</code>.  If the price moves by more than 1% in a given trading round then trading is
         temporarially suspended for 5 minutes.   These protections prevent rapid changes in price as a result of market
         manipulation and give traders an opportunity to add collateral or enter new bids to stabalize the price.
         </p>

         <h3> Blockchain Security </h3>
         <p>
         The blockchain will use a <a href="/security/timekeeper">Timekeeper</a> combined 
         with <a href="/security/TaPOS">Transactions as Proof of Stake (TaPOS)</a> to secure the 
         network over the short and long term horizon.  This will give the network a 
         30 second block interval.
         </p>

      </div> <!-- article -->
