# Product Requirement Document 

#### Why? (Objective)
1. **For Business**:
       a) Establishing an online presence
       b) Reach out to the public and advertise and sell their product (IT and Cybersecurity Documents)
2. **For Users**:
       a)  Organized, easily accessible and secure platform for accessing the pdf documents

#### How do we measure success?
1. Good Search Engine Optimisation
2. Threat readiness of the website against data breaches
3. Easily manageable uploading of PDF's and security management for the website.

#### Who are the stakeholders?
1. Information providers (those who will upload documents)
2. Individuals who will be accessing materials from the site
3. Developers working further on the website
4. Persons dealing with the security of the website

#### Solution? 
A website whose working is as follows. 
```mermaid
graph TD
    %% Shared Entry
    Start([User Visits Website]) --> Landing[Landing Page]

    %% Landing Page Sections
    subgraph Landing Page Sections
        Landing --> About[About Section]
        Landing --> Contact[Contact Information Section]
        Landing --> FreeMat[Free Material Section]
    end

    %% Free Material Flow
    FreeMat --> |View/Download| PublicPDF[(Public PDFs)]

    %% Authentication Flow
    Landing --> Auth{Has Account?}
    Auth -->|No| Register[Registration Page]
    Auth -->|Yes| Login[Login Page]
    
    Register --> Login
    Login --> Dashboard[User Dashboard / Main Area]

    %% Premium Content Flow
    Dashboard --> PaidPage[Separate Premium Page]
    PaidPage --> LockedMat{Is Material Paid/Locked?}
    LockedMat -->|Yes| PayWall[Payment Gateway]
    LockedMat -->|No/Unlocked| AccessPDF[(Paid/Locked PDFs)]
    PayWall -->|Payment Success| AccessPDF

    %% Admin Flow
    AdminStart([Admin Log In]) --> AdminPage[Dedicated Admin Page]
    AdminPage --> Upload{Upload PDF}
    Upload -->|Categorize as Free| PublicPDF
    Upload -->|Categorize as Locked/Paid| AccessPDF

    %% Styling
    style Start fill:#f9f,stroke:#333,stroke-width:2px
    style AdminStart fill:#ff9,stroke:#333,stroke-width:2px
    style Landing fill:#bbf,stroke:#333,stroke-width:2px
    style AdminPage fill:#fbb,stroke:#333,stroke-width:2px

```

#### Product Flow
**User flow**: The user flow is depicted by the following flow chart 
```mermaid
graph TD
    %% 🌟 ENTRY PHASE
    Start([User Visits Website]) --> Landing[Landing Page Ready]

    %% 🧭 NAVIGATION PHASE
    Landing --> NavBar{User Interacts with Navbar}
    
    %% 📂 PUBLIC CONTENT BRANCHES
    NavBar -->|Clicks About| About[Views About Section]
    NavBar -->|Clicks Contact| Contact[Views Contact Details]
    NavBar -->|Clicks Products| ReadingSec[Views Reading Material Section]

    %% ℹ️ ABOUT SECTION EXPANSION
    About --> AboutImg[Photo of Organization]
    About --> AboutText[Paragraph About Organization]

    %% 📞 CONTACT SECTION EXPANSION
    Contact --> Phone[Contact Number]
    Contact --> Location[Office Location]
    Contact --> Email[Email ID]

    %% 📄 FREE MATERIAL SECTION EXPANSION
    ReadingSec --> FreeList[Displays 3 Public PDFs]
    FreeList --> PDF1[Public PDF 1]
    FreeList --> PDF2[Public PDF 2]
    FreeList --> PDF3[Public PDF 3]
    
    %% 🔒 AUTHENTICATION TRIGGERS
    PDF1 --> ViewMore[Clicks 'View More' Button]
    PDF2 --> ViewMore
    PDF3 --> ViewMore
    
    ViewMore --> LoginPrompt[Sees Auth Prompt: 'Login to Access More Material']
    LoginPrompt --> LoginPage[Redirected to Login Page]
    LoginPage --> RegnPage{Registered?}

    %% 🔐 PREMIUM GATEWAY PHASE
    RegnPage --> |yes| InputCredentials[User Enters Credentials]
    RegnPage --> |no | RedRegn[Redirected to registration page]
    RedRegn --> InputCredentials2[User Enters Credentials]
    InputCredentials2 --> LoginPage[Redirected to Login Page]
    InputCredentials --> PaidPage[Accesses Gated Content Page: Paid Reading Material]
    
    %% 💰 PREMIUM SELECTION
    PaidPage --> PaidList[Displays Locked Documents]
    PaidList --> PaidPDF1[Paid PDF 1]
    PaidList --> PaidPDF2[Paid PDF 2]
    PaidList --> PaidPDF3[Paid PDF 3]

    %% 💳 TRANSACTION PHASE
    PaidPDF1 -->|Clicks Document| PayWall[Redirected to Payment Page]
    PaidPDF2 -->|Clicks Document| PayWall
    PaidPDF3 -->|Clicks Document| PayWall
    
    PayWall --> ProcessPay[Processes Transaction]
    ProcessPay --> Success[Payment Success]
    
    %% 🎉 OUTCOME PHASE
    Success --> Access([Unlocks Access & Starts PDF Download])

    %% 🎨 VISUAL STYLING
    style Start fill:#e1f5fe,stroke:#03a9f4,stroke-width:2px
    style NavBar fill:#fff9c4,stroke:#fbc02d,stroke-width:2px
    style ViewMore fill:#ffe0b2,stroke:#f57c00,stroke-width:2px
    style LoginPage fill:#ffcdd2,stroke:#d32f2f,stroke-width:2px
    style PayWall fill:#f8d7da,stroke:#721c24,stroke-width:2px
    style Access fill:#c8e6c9,stroke:#388e3c,stroke-width:2px

```

**Admin Flow**: The admin flow is depicted by the following flow chart 
```mermaid
graph TD
    %% Entry Point
    AdminStart([Admin Arrives at Website]) --> AdminLogin[Restricted Admin Login Page]

    %% Authentication Decision
    AdminLogin --> Credentials{Enter Admin Credentials}
    Credentials -->|Invalid| LoginFail[Show Error / Access Denied]
    LoginFail --> AdminLogin
    
    Credentials -->|Valid| AdminDashboard[Dedicated Admin Page / Dashboard]

    %% Admin Actions
    subgraph Dashboard Actions
        AdminDashboard --> UploadAction[Click: Upload New Document]
        AdminDashboard --> ManageAction[Manage Existing Documents]
        ManageAction --> |For each document| Manager[Managing page]
        Manager --> Delete[Deleting a document]
        Manager --> Change[Change status between paid and free documents]
        Manager --> Name[Change name or title of document]
    end

    %% Upload Workflow
    UploadAction --> FileSelect[Select PDF File from Local Device]
    FileSelect --> MetaData[Input Document Title & Description]
    
    %% Categorization Decision
    MetaData --> CatDecision{Set Access Level}
    
    %% Route to Frontend Sections
    CatDecision -->|Public / Free| PublicRoute[Route to: Public Reading Section]
    CatDecision -->|Locked / Paid| PremiumRoute[Route to: Separate Locked Material Page]

    %% Final Visibility on Frontend
    subgraph Live Website Output
        PublicRoute --> LiveFree[Appears as one of the Public PDFs]
        PremiumRoute --> LivePremium[Appears as Gated Content requiring login/payment]
    end

    %% Styling
    style AdminStart fill:#f8d7da,stroke:#721c24,stroke-width:2px
    style AdminDashboard fill:#cce5ff,stroke:#004085,stroke-width:2px
    style LiveFree fill:#d4edda,stroke:#28a745,stroke-width:1px
    style LivePremium fill:#fff3cd,stroke:#856404,stroke-width:1px

```

#### Features 
1. Public access to free reading material
2. Only paid users can access the locked reading material
3. Authentication for the users, to register and login to the site (Registration and Google OAuth)
4. Admin page to add new pdf documents for the users, also it will be used to edit the contact details and about section (documents can be added to free as well as paid section)
5. Payment method to be added for locked reading material

#### Dependencies
1. **Technology Stack:**
| Component Type | Technology Selected | Application Responsibility & Security Function |
| :--- | :--- | :--- |
| **Logic Engine** | PHP 8.3+ | Orchestrates sessions, input validation, and file routing controls. |
| **Data Interface** | PHP PDO | Executes database operations; natively blocks SQLi via parameterized queries. |
| **UI Framework** | Bootstrap 5.x | Form and grid layouts; provides client-side presentation state. |
| **Identity/Auth** | Google OAuth 2.0 SDK | Federated sign-in logic; eliminates local password brute-forcing risk. |
| **FinTech/Payment** | Stripe PHP SDK | Checkout logic; processes access tokens via signed backend webhooks. |
