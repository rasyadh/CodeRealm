<section class="hero-skills">
<div class="ui center aligned container" id="hero-content">
    <div class="ui container">
        <h1 class="ui inverted header">Skills Content</h1>
        <p class="ui inverted header">Learn the fundamentals of design, front-end development, and crafting user experiences that are easy on the eyes.</p>
        <a class="ui large black button" href="<?= site_url('users/signup'); ?>">Enroll Now</a>
    </div>
</div>
</section>

<main class="learn-realm">
    <div class="ui container">
        <div class="ui stackable grid">
            <div className="ten wide column">

                {props.course[0].courses.map((data) =>
                    <div className="ui container" key={data.titleCourse}>
                        <div className="title-course">
                            <h2>{data.titleCourse}</h2>
                            <p>{data.descriptionCourse}</p>
                        </div>
                        {data.course.map((data) =>
                            <div className="ui segment" key={data.courseName}>
                                <div className="ui stackable middle aligned grid">
                                    <div className="three wide column">
                                        <Link to={data.courseUrl}>
                                            <img className="ui small circular image" src={require(`../Image/Course/${data.courseBadge}`)} alt={data.courseName} />
                                        </Link>
                                    </div>
                                    <div className="thirteen wide column">
                                        <div className="ui small label">Course</div><br />
                                        <Link to="/skills"><h2>{data.courseName}</h2></Link>
                                        <p>{data.courseDescription}</p>
                                    </div>
                                </div>
                            </div>
                        )}
                        <br />
                    </div>
                )}

            </div>
            <div class="two wide column"></div>
            <div className="four wide column">
                <div className="ui center aligned container">
                    <div className="ui card">
                        <div className="image">
                            <img src={require(`../Image/Badge/${props.course[0].badgeUrl}`)} alt={props.course[0].title} />
                        </div>
                        <div className="content">
                            <div className="header">
                                Courses Complete
                        </div>
                            <div className="meta">
                                {props.course[0].completedCourses}/{props.course[0].numOfCourses} Complete
                        </div>
                        </div>
                        <div className="extra content">
                            My Account
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main >